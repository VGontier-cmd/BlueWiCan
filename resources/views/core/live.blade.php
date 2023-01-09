@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="gradient-line"></div>
        <div class="dataTable-container">
            <div id="candatas-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <div class="dt-buttons btn-group flex-wrap">
                            <h3 class="main-title">Receive</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table dataTable table-striped table-bordered table-hover no-footer" id="candatas-table" aria-describedby="candatas-table_info">
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
                                <?php for($i = 0; $i < 20; $i++) {
                                    if($i%2 == 0)
                                        $boolColor = "odd";
                                    else {
                                        $boolColor = "even";
                                    }?>
                                <tr id="<?php echo $i; ?>" class="<?php echo $boolColor; ?>">
                                    <td class="sorting_1">000h</td>
                                    <td></td>
                                    <td>8</td>
                                    <td>00 01 02 03 04 05 06 07</td>
                                    <td>1502.0</td>
                                    <td>8</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
