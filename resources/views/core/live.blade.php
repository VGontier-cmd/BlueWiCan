@extends('layouts.app')

@push('head')
    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <div class="card">
        <div class="gradient-line"></div>
        <div class="dataTable-container pb-0">
            <div id="live-table__container" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row">
                    <div class="col-sm-12 mb-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <form>
                                <button id="btn-websockets" v-if="!connected" v-on:click="connect()" class="btn btn-primary" tabindex="0" type="button" title="Lancer">
									<i class="bi bi-power"></i>
									<div v-if="connected" class="spinner">
										<div class="spinner-border" role="status">
											<span class="sr-only"></span>
										</div>
									</div>
								</button>
                                <button id="btn-websockets" v-if="connected" v-on:click="disconnect()" class="btn btn-danger" tabindex="0" type="button" title="Arrêter"><i class="bi bi-power"></i></button>
                            </form>
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
                                <table class="table dataTable table-striped table-bordered table-hover no-footer" style="margin: 0 !important">
                                    <thead>
                                        <tr>
                                            <th title="CAN-ID" tabindex="0" rowspan="1" colspan="1">CAN-ID</th>
                                            <th title="Length" tabindex="0" rowspan="1" colspan="1">Length</th>
                                            <th title="Data" tabindex="0" rowspan="1" colspan="1">Data</th>
											<th title="Data" tabindex="0" rowspan="1" colspan="1">Date de réception</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="incomingDatas" v-for="(data, index) in incomingDatas">
                                            <td>@{{ data.id }}</td>
                                            <td>@{{ data.sizeTrame }}</td>
                                            <td>@{{ data.trame }}</td>
											<td>@{{ data.date }}</td>
                                        </tr>
										<tr v-if="incomingDatas.length === 0" class="live-table__empty"><td colspan="4">Aucune donnée reçue...</td></tr>
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
			connect() {
				this.socket = new WebSocket(`ws://${this.wsHost}:${this.wsPort}`);

				this.socket.onopen = (e) => {
					this.connected = true;
					this.showToast('success', 'Connexion réussie.')
					console.log("[open] Connection established");
					console.log("Sending to server");
					this.socket.send("My name is John");
				};

				this.socket.onmessage = function(event) {
					this.showToast('info', 'Nouveau message reçu.')
					console.log(`[message] Data received from server: ${event.data}`);
				};

				this.socket.onclose = function(event) {
					if (event.wasClean) {
						this.showToast('info', 'Déconnexion réussie.')
						console.log(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`);
					} else {
						// e.g. server process killed or network down
						// event.code is usually 1006 in this case
						console.log('[close] Connection died');
					}
				};

				this.socket.onerror = function(error) {
					console.log(`[error]`);
				};            
			},
			
			disconnect() {
				this.connected = false;
				this.showToast('info', 'Déconnexion réussie.')
			},

			showToast(lvl, msg) {				
				this.flashMessage = null;
				this.flashMessage = {
					level: lvl,
					message: msg
				}
				
				$('.toast').removeClass('closed')
				setTimeout(() => {
					$('.toast').addClass('closed')
				}, 5000);
			},

			hideToast() {
				$('.toast').addClass('closed');
			}
		}
    });
</script>
@endpush
