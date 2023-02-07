@extends('layouts.app')

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
    <div class="row mb-4">
        <div class="col-xl-7">
            <div class="card card-graph" :class="{ 'show': currentGraph == 'day' }">
                <div class="card-header bg-white">
                    <h5 class="card-title">Data(s) saved today</h5>
                    <h6 class="card-subtitle text-muted">Number of frames saved today : {{ $today }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="today-chart"></canvas>
                </div>
            </div>

            <div class="card card-graph" :class="{ 'show': currentGraph == 'month' }">
                <div class="card-header bg-white">
                    <h5 class="card-title">Data(s) saved this month</h5>
                    <h6 class="card-subtitle text-muted">Number of frames saved by days for {{ $month }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="month-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-5 ms-auto mt-xl-0">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="card-count"> 
                                <span>{{ $nb_trames_total }}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Frames saved</h6>
                            <p class="opacity-8 mb-0 text-sm">Total</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-0">
                    <div v-on:click="showCurrentDayGraph()" class="card card-clickable" :class="{ 'active': currentGraph == 'day' }">
                        <div class="card-body text-center">
                            <h1 class="card-count"> 
                                <span>{{ $nb_trames_current_day }}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Frames saved</h6>
                            <p class="opacity-8 mb-0 text-sm">Today</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div v-on:click="showCurrentMonthGraph()" class="card card-clickable" :class="{ 'active': currentGraph == 'month' }">
                        <div class="card-body text-center">
                            <h1 class="card-count"> 
                                <span>{{ $nb_trames_current_month }}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Frames saved</h6>
                            <p class="opacity-8 mb-0 text-sm">This month</p>
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
            currentGraph: 'day'
        },
        mounted() {
            this.showCurrentDayGraph()
        },
        methods: {
            showCurrentMonthGraph() {
                this.currentGraph = 'month'
            },

            showCurrentDayGraph() {
                this.currentGraph = 'day'
            }
        }
    });
</script>

<script>
var ctx_today = document.getElementById('today-chart').getContext('2d');
var todayChart = new Chart(ctx_today, {
    type: 'bar',
    data: {
        labels: [
            @foreach ($data_graph_day as $data)
                '{{ $data->hour }}:00',
            @endforeach
        ],
        datasets: [{
            label: 'Nombre de trames enregistrées',
            data: [
                @foreach ($data_graph_day as $data)
                    {{ round($data->count) }},
                @endforeach
            ],
            backgroundColor: [
                '#243783'
            ],
            borderColor: [
                '#243783'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx_month = document.getElementById('month-chart').getContext('2d');
var monthChart = new Chart(ctx_month, {
    type: 'bar',
    data: {
        labels: [
            @foreach ($labels_graph_month as $label)
                '{{ $label }}',
            @endforeach
        ],
        datasets: [{
            label: 'Nombre de trames enregistrées',
            data: [
                @foreach ($data_graph_month as $data)
                    {{ round($data->count) }},
                @endforeach
            ],
            backgroundColor: [
                '#243783'
            ],
            borderColor: [
                '#243783'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
@endpush
