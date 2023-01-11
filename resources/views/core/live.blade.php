@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="gradient-line"></div>
        <div class="dataTable-container pb-0">
            <div id="live-table__container" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row">
                    <div class="col-sm-12 mb-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button class="btn btn-secondary btn-primary" tabindex="0" aria-controls="candatas-table" type="button" title="Lancer/Arrêter"><i class="bi bi-power"></i></button>
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
                                            <th title="Type" tabindex="0" rowspan="1" colspan="1">Type</th>
                                            <th title="Length" tabindex="0" rowspan="1" colspan="1">Length</th>
                                            <th title="Data" tabindex="0" rowspan="1" colspan="1">Data</th>
                                            <th title="Cycle Time" tabindex="0" rowspan="1" colspan="1">Cycle Time</th>
                                            <th title="Count" tabindex="0" rowspan="1" colspan="1">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i < 20; $i++)
                                            <tr>
                                                <td>000h</td>
                                                <td></td>
                                                <td>8</td>
                                                <td>00 01 02 03 04 05 06 07</td>
                                                <td>1502.0</td>
                                                <td>8</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="candatas-table_processing" class="dataTables_processing card" style="display: none;">Traitement...
                            <div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
