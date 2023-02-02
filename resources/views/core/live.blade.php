@extends('layouts.app')

@push('head')
    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
	<div id="app">
		<div id="toast-wrapper" class="toast-wrapper">
			@include('partials._toast')
		</div>
		<div class="card">
			<div class="gradient-line"></div>
			<div class="dataTable-container pb-0">
				<div id="live-table__container" class="dataTables_wrapper dt-bootstrap5 no-footer">
					<div class="row">
						<div class="col-sm-12 mb-0">
							<div class="dt-buttons d-flex align-items-center">
								<button v-if="!connected" v-on:click="connect()" class="app-btn btn--square btn--primary" tabindex="0" type="button" title="Lancer">
									<i class="bi bi-power"></i>
									<div v-if="loading" class="spinner">
										<div class="spinner-border" role="status">
											<span class="sr-only"></span>
										</div>
									</div>
								</button>
								<button v-if="connected" v-on:click="disconnect()" class="app-btn btn--square btn btn-danger" tabindex="0" type="button" title="Arrêter"><i class="bi bi-power"></i></button>
								<button v-on:click="save()" class="app-btn btn--square btn--primary" tabindex="0" type="button" title="Enregistrer">
									<i class="bi bi-database-add"></i> 
								</button>
								<button v-on:click="clear()" class="app-btn btn--square btn--primary" tabindex="0" type="button" title="Supprimer">
									<i class="bi bi-eraser"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="live-table__wrapper">
								<!-- table section -->
								<div class="dataTable-live__header">
									<h3 class="dataTable-live__section">Receive</h3>
								</div>
								<!-- table -->
								<div class="live-table__table">
									<table id="live-table" class="table dataTable table-striped table-bordered table-hover no-footer" style="margin: 0 !important">
										<thead>
											<tr>
												<th title="CAN-ID" tabindex="0" rowspan="1" colspan="1">CAN-ID</th>
												<th title="Data" tabindex="0" rowspan="1" colspan="1">Data</th>
												<th title="Length" tabindex="0" rowspan="1" colspan="1">Length</th>
												<th title="Data" tabindex="0" rowspan="1" colspan="1">Date de réception</th>
											</tr>
										</thead>
										<tbody>
											<tr v-if="incomingDatas" v-for="(data, index) in incomingDatas">
												<td>@{{ data.id.toUpperCase() }}</td>
												<td>@{{ data.trame.toUpperCase() }}</td>
												<td>@{{ data.sizeTrame }}</td>
												<td value="{{ now() }}">@{{ getDateNow() }} - @{{ getTimeNow() }}</td>
											</tr>
											<tr v-if="incomingDatas.length == 0" class="live-table__empty"><td colspan="4">Aucune donnée reçue...</td></tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
<script>	
    new Vue({
		el: "#app",
		data: {
			connected: false,
			loading: false,
			canData: null,
			socket: null,
			wsHost: "{{ $ws_host }}",
			wsPort: "{{ $ws_port }}",
			flashMessage: null,
			incomingDatas: []
		},
		mounted() {

		},
		methods: {
			// permet de se connecter au serveur websockets
			connect() {
				this.socket = new WebSocket(`ws://${this.wsHost}:${this.wsPort}`);
				this.loading = true;

				// lorsqu'un client a réussi à se connecter au serveur websockets
				this.socket.onopen = (event) => {
					this.connected = true;
					this.loading = false;
					this.showToast('success', 'Connexion réussie.')
					console.log("[open] Connection established");
				};

				// lorsqu'un client reçoit un message du serveur websockets
				this.socket.onmessage = (event) => {
					this.loading = false;
					console.log(`[message] Data received from server: ${event.data}`);

					let incomingData = JSON.parse(event.data);
					this.incomingDatas.push(incomingData);
				};

				// lorsqu'une erreur survient
				this.socket.onerror = (error) => {
					console.log(error)
					this.loading = false;
					this.showToast('warn', `Erreur de connexion.`)
					console.log(`[error]`);
				};     
			},
			
			// permet de se déconnecter du serveur websockets
			disconnect() {
				this.socket.close();
				this.socket.onclose = (event) => {
					this.connected = false;
					this.loading = false;
					if (event.wasClean) {
						this.connected = false;
						this.showToast('info', 'Déconnexion réussie.')
						console.log(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`);
					} else {
						// e.g. server process killed or network down
						// event.code is usually 1006 in this case
						console.log('[close] Connection died');
					}
				};
			},

			// permet d'enregistrer les données live en base de données
			save() {
				const rows = document.querySelectorAll('#live-table tbody tr')
				dataArray = []
				for (let i = 0; i < rows.length; i++) {
					var cells = rows[i].getElementsByTagName('td');
					var id = cells[0].innerHTML;
					var trame = cells[1].innerHTML;
					var sizeTrame = cells[2].innerHTML;
					var created_at = cells[3].getAttribute('value');
					dataArray.push({given_id: id, length: sizeTrame, data: trame, created_at: created_at});
				}

				fetch('/save-data', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					body: JSON.stringify({
            			datas: dataArray
        			})
				})
				.then(response => response.json())
				.then(data => {
					this.showToast('success', `Les données ont été enregistrées avec succés`)
					console.log(data);
					console.log('Data saved successfully');
				})
				.catch(error => {
					this.showToast('error', `Echec de l'enregistrement.`)
					console.error('Error saving data: ', error);
				});
			},

			// permet de vider le tableau de données
			clear() {
				this.incomingDatas = []
			},

			// permet d'afficher un message en précisant son niveau et le message
			showToast(lvl, msg) {				
				this.loading = false;
				this.flashMessage = null;
				this.flashMessage = {
					level: lvl,
					message: msg
				}
				
				$('.toast').removeClass('closed')
				setTimeout(() => {
					$('.toast').addClass('closed')
				}, 3000);
			},

			// permet de cacher un toast
			hideToast() {
				$('.toast').addClass('closed');
			},

			// retourne l'heure actuelle
			getTimeNow(){
				console.log(new Date())
				Date.prototype.timeNow = function () {
					return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds()+":"+ this.getMilliseconds();
				}

				return new Date().timeNow();
			},

			// retourne la date actuelle
			getDateNow(){
				Date.prototype.dateNow = function () {
					return String(this.getDate()).padStart(2, '0') + '/' + String(this.getMonth() + 1).padStart(2, '0') + '/' + this.getFullYear();
				}
				return new Date().dateNow();
			}
		}
    });
</script>
@endpush
