@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="table-header d-lg-flex">
                <div>
                    <h5 class="main-title mb-0">Toutes les trames</h5>
                    <p class="subtitle text-sm mb-0">Liste de toutes les trames</p>
                </div>
            </div>
            <div class="gradient-line"></div>
            <div class="dataTable-container">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush