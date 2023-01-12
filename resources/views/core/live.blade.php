@extends('layouts.app')

@push('head')
    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <div class="card" id="app">
        <div class="gradient-line"></div>
        <div class="dataTable-container pb-0">
            <div id="live-table__container" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row">
                    <div class="col-sm-12 mb-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <form>
                                <button v-if="!connected" v-on:click="connect()" class="btn btn-primary" tabindex="0" type="button" title="Lancer"><i class="bi bi-power"></i></button>
                                <button v-if="connected" v-on:click="disconnect()" class="btn btn-danger" tabindex="0" type="button" title="Arrêter"><i class="bi bi-power"></i></button>
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
                                <table class="table dataTable table-striped table-bordered table-hover no-footer" style="margin-top: 0 !important">
                                    <thead>
                                        <tr>
                                            <th title="CAN-ID" tabindex="0" rowspan="1" colspan="1">CAN-ID</th>
                                            <th title="Length" tabindex="0" rowspan="1" colspan="1">Length</th>
                                            <th title="Data" tabindex="0" rowspan="1" colspan="1">Data</th>
											<th title="Data" tabindex="0" rowspan="1" colspan="1">Date de réception</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(data, index) in incomingDatas">
                                            <td>@{{ data.id }}</td>
                                            <td>@{{ data.sizeTrame }}</td>
                                            <td>@{{ data.trame }}</td>
											<td>@{{ data.date }}</td>
                                        </tr>
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
			pusher: null,
			canData: null,
			apps: {!! json_encode($apps) !!},
			logChannel: "{{ $logChannel }}",
			authEndpoint: "{{ $authEndpoint }}",
			host: "{{ $host }}",
			port: "{{ $port }}",
			state: null,
			formError: false,
			incomingDatas: []
		},
		mounted() {
			this.app = this.apps[0] || null;
		},
		methods: {
			connect() {
				console.log("connected")
				
				this.pusher = new Pusher("staging", {
					wsHost: this.host,
					wsPort: this.port,
					wssPort: this.port,
					wsPath: this.app.path,
					disableStats: true,
					authEndpoint: this.authEndpoint,
					forceTLS: false,
					auth: {
						headers: {
							"X-CSRF-Token": "{{ csrf_token() }}",
							"X-App-ID": this.app.id
						}
					},
					enabledTransports: ["ws", "flash"]
				});
                console.log(this.pusher)

				this.pusher.connection.bind('state_change', states => {
					this.state = states.current
				});

				this.pusher.connection.bind('connected', () => {
					this.connected = true;
				});

				this.pusher.connection.bind('disconnected', () => {
					this.connected = false;
				});

				this.pusher.connection.bind('error', event => {
                    console.log(event)
					this.formError = true;
				});

				this.subscribeToAllChannels();
			},
			
			subscribeToAllChannels() {
				[
					"api-message"
				].forEach(channelName => this.subscribeToChannel(channelName));
			},

			subscribeToChannel(channelName) {
				let inst = this;
				this.pusher.subscribe(this.logChannel + channelName)
					.bind("log-message", (data) => {
                    console.log(data)
					if (data.type === "api-message") {
						if (data.details.includes("SendDataEvent")) {
							let incomingData = JSON.parse(data.data);
							inst.incomingDatas.push(incomingData);
						}
					}
				});
			},
            /**
			sendData() {
          		this.formError = false;
				if (this.canData === "" || this.canData === null) {
					this.formError = true;
				} else {
					$.post("/data/send", {
						_token: '{{ csrf_token() }}',
						id: this.canData.id,
						length: this.canData.length,
						data: this.canData.data
					}).fail(() => {
						alert("Error sending event.")
					});
				}
          	},*/

			disconnect() {
				this.connected = false;
			}
		}
    });
</script>
@endpush
