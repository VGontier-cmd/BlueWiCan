@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="gradient-line"></div>
        <div class="dataTable-container">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush