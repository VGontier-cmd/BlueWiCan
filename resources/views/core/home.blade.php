@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="d-lg-flex p-4">
                <div>
                    <h5 class="mb-0">Toutes les trames</h5>
                    <p class="text-sm mb-0">Liste de toutes les trames</p>
                </div>
            </div>
            <div class="dataTable-container">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush