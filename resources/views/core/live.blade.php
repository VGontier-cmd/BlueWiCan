@extends('layouts.app')

@section('content')
	<div id="toast-wrapper" class="toast-wrapper">
		@include('partials._toast')
	</div>
	<div class="card card-table">
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
							<button v-if="connected" v-on:click="disconnect()" class="app-btn btn--square btn-danger" tabindex="0" type="button" title="Arrêter"><i class="bi bi-power"></i></button>
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
								<div title="Datas received" class="count-datas">@{{ incomingDatas.length }}</div>
								<h3 class="dataTable-live__section">Receive</h3>
							</div>
							<!-- table -->
							<div class="live-table__table">
								<table id="live-table" class="table dataTable table-striped table-bordered table-hover no-footer" style="margin: 0 !important">
									<thead>
										<tr>
											<th title="CAN-ID" tabindex="0" rowspan="1" colspan="1">ID</th>
											<th title="Data" tabindex="0" rowspan="1" colspan="1">DATA</th>
											<th title="Length" tabindex="0" rowspan="1" colspan="1">LENGTH</th>
											<th title="Data" tabindex="0" rowspan="1" colspan="1">RECEIVED_AT</th>
										</tr>
									</thead>
									<tbody>
										<tr v-if="incomingDatas" v-for="(data, index) in incomingDatas">
											<td>@{{ data.id.toUpperCase() }}</td>
											<td>@{{ data.trame.toUpperCase() }}</td>
											<td>@{{ data.sizeTrame }}</td>
											<td value="@{{ data.date }}">@{{ getDate(data.date) }} - @{{ getTime(data.date) }}</td>
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
		mounted() {},
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
					let dataExists = this.incomingDatas.find(data => data.id === incomingData.id);
					// si la data existe déjà on remplace ses données
					if(dataExists) {
						dataExists.trame = incomingData.trame
						dataExists.sizeTrame = incomingData.sizeTrame
						dataExists.date = incomingData.date
					// sinon on l'ajoute
					} else {
						this.incomingDatas.push(incomingData);
					}

					// Update de la scrollbar
					const scrollableDiv = $(".live-table__table")[0];
					scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
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
				if(this.incomingDatas && this.incomingDatas.length > 0) {
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
				} else {
					this.showToast('info', `Aucune donnée à enregistrer.`)
				}
			},

			// permet de vider le tableau de données
			clear() {
				if(this.incomingDatas && this.incomingDatas.length > 0) {
					this.incomingDatas = []
					this.showToast('info', 'Suppression du tableau réussie.')
				} else {
					this.showToast('info', 'Aucune donnée à supprimer.')
				}
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
			getTime(currentDate){
				Date.prototype.time = function () {
					return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds()+":"+ this.getMilliseconds();
				}

				return new Date(currentDate).time();
			},

			// retourne la date actuelle
			getDate(currentDate){
				Date.prototype.date = function () {
					return String(this.getDate()).padStart(2, '0') + '/' + String(this.getMonth() + 1).padStart(2, '0') + '/' + this.getFullYear();
				}
				return new Date(currentDate).date();
			}
		}
    });
</script>
@endpush
