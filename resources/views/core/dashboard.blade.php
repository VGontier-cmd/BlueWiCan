@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
            </div>
        </div>
        <div class="col-xl-5 ms-auto mt-xl-0">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary">
                                <span>{{ $nb_trames }}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Trames enregistrées</h6>
                            <p class="opacity-8 mb-0 text-sm">Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"> 
                                <span>{{ $nb_trames_today }}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Trames enregistrées</h6>
                            <p class="opacity-8 mb-0 text-sm">Aujourd'hui</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary">
                                <span>...</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">...</h6>
                            <p class="opacity-8 mb-0 text-sm">...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary">
                                <span>...</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">...</h6>
                            <p class="opacity-8 mb-0 text-sm">...</p>
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
            data: {},
            mounted() {},
            methods: {}
        });
    </script>
@endpush
