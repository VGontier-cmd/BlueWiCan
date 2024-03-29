<?php

namespace App\DataTables;

use App\Models\CanData;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CanDatasDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function($data){ 
                return $data->created_at->format('d/m/Y à H:i:s'); 
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CanData $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CanData $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('candatas-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->lengthMenu([50, 100, 500, 1000])
                    ->orderBy(3)
                    ->pageLength(50)
                    ->selectStyleSingle()
                    ->responsive(true)
                    ->autoWidth(false)
                    ->languageSearch('<div class="search-icon"><i class="bi bi-search"></i></div>')
                    ->languageSearchPlaceholder('Search...')
                    ->languageSelectColumns("")
                    ->buttons([
                        Button::make('reload'),
                        Button::make('print'),
                        Button::make('pdf'),
                        Button::make('excel'),
                        Button::make('csv')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('data'),
            Column::make('length'),
            Column::make('created_at')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'CanDatas_' . date('YmdHis');
    }
}
