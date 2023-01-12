@extends('layouts.app')

@section('head')
    <script src="https://js.pusher.com/7.2.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.7.14/vue.min.js" integrity="sha512-BAMfk70VjqBkBIyo9UTRLl3TBJ3M0c6uyy2VMUrq370bWs7kchLNN9j1WiJQus9JAJVqcriIUX859JOm12LWtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

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
						<p>@{{ state }}</p>
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
                                            <th title="Type" tabindex="0" rowspan="1" colspan="1">Type</th>
                                            <th title="Length" tabindex="0" rowspan="1" colspan="1">Length</th>
                                            <th title="Data" tabindex="0" rowspan="1" colspan="1">Data</th>
                                            <th title="Cycle Time" tabindex="0" rowspan="1" colspan="1">Cycle Time</th>
                                            <th title="Count" tabindex="0" rowspan="1" colspan="1">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(data, index) in incomingDatas">
                                            <td>@{{ data.id }}</td>
                                            <td>@{{ data.type }}</td>
                                            <td>@{{ data.length }}</td>
                                            <td>@{{ data.data }}</td>
                                            <td>@{{ data.time }}</td>
                                            <td>@{{ data.count }}</td>
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
			app: null,
			apps: {!! json_encode($apps) !!},
			logChannel: "{{ $logChannel }}",
			authEndpoint: "{{ $authEndpoint }}",
			host: "{{ $host }}",
			port: "{{ $port }}",
			state: null,
			formError: false,
			incomingDatas: [
				{
					id: "000h",
					type: "",
					length: 8,
					data: "00 01 02 03 04 05 06 07",
					time: 1502.0,
					count: 8
				}
            ]
		},
		mounted() {
			this.app = this.apps[0] || null;
		},
		methods: {
			connect() {
				console.log("connected")
                console.log(this.host, this.port, this.app,this.authEndpoint)	
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
					console.log(states)
					this.state = states.current
				});

				this.pusher.connection.bind('connected', () => {
					console.log("bind connected")
					this.connected = true;
				});

				this.pusher.connection.bind('disconnected', () => {
					console.log("bind disconnected")
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
					if (data.type === "api-message") {
						if (data.details.includes("SendMessageEvent")) {
							let messageData = JSON.parse(data.data);
							let utcDate = new Date(messageData.time);
							messageData.time = utcDate.toLocaleString();
							inst.incomingMessages.push(messageData);
						}
					}
				});
			},

			disconnect() {
				console.log("disconnected")
				this.connected = false;
			}
		}
    });
</script>
@endpush
