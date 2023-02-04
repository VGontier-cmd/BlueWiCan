@extends('layouts.app')

@section('content')
    <div class="card card-table">
        <div class="dataTable-container">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>	
    new Vue({
        el: "#app",
        data: {},
        mounted() {},
        methods: {}
    });
</script>
@endpush