<?php

namespace App\DataTables;

use App\Models\Costumers;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CostumersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent(
                $query->with('pekerjaan', 'province', 'city', 'subDistrict', 'ward')
            )
            ->addIndexColumn()
            ->editColumn('tanggal_lahir', function ($row) {
                return dateWithFullMonthFormat($row->tanggal_lahir);
            })
            ->editColumn('kode_pekerjaan', function ($row) {
                return $row->pekerjaan ? $row->pekerjaan->nama : " - ";
            })
            ->editColumn('kode_provinsi', function ($row) {
                return $row->province ? $row->province->nama : " - ";
            })
            ->editColumn('kode_kabupaten_kota', function ($row) {
                return $row->city ? $row->city->nama : " - ";
            })
            ->editColumn('kode_kecamatan', function ($row) {
                return $row->subDistrict ? $row->subDistrict->nama : " - ";
            })
            ->editColumn('kode_kelurahan', function ($row) {
                return $row->ward ? $row->ward->nama : " - ";
            })
            ->editColumn('is_approved', function ($row) {
                if (!Gate::allows('costumers_edit')) {
                    return '-';
                }

                $routeUpdateStatus = route($row->is_approved ? 'nasabah.notapprove' : 'nasabah.approve', enkrip($row->id));

                if ($row->is_approved) {
                    return '<a href="' . $routeUpdateStatus . '" class="btn btn-success btn-sm">Approve</a>';
                } else {
                    return '<a href="' . $routeUpdateStatus . '" class="btn btn-danger btn-sm">Tidak Approve</a>';
                }
            })
            ->rawColumns(['is_approved']);
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Costumers $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Costumers $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('costumers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-2'f><'col-sm-10'>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-1 mt-1'l><'col-sm-4 mt-3'i><'col-sm-7'p>>")
//            ->buttons(['excel'])
            ->scrollX(true)
            ->scrollY('500px')
            ->fixedColumns(['left' => 3, 'right' => 1])
            ->language(['processing' => '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'])
            ->orderBy(1, 'asc')
            ->parameters([
                "lengthMenu" => [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ]
            ])
            ->addTableClass('table align-middle table-rounded table-striped table-row-gray-300 fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('No.')->searchable(false)->orderable(false)->addClass('text-center'),
            Column::make('nama')->title('Nama'),
            Column::make('tempat_lahir')->title('Tempat Lahir'),
            Column::make('tanggal_lahir'),
            Column::make('jenis_kelamin')->title('Jenis Kelamin'),
            Column::make('kode_pekerjaan')->title('Pekerjaan'),
            Column::make('kode_provinsi')->title('Provinsi'),
            Column::make('kode_kabupaten_kota')->title('Kota/Kabupaten'),
            Column::make('kode_kecamatan')->title('Kecamatan'),
            Column::make('kode_kelurahan')->title('Kelurahan'),
            Column::make('alamat')->title('Alamat'),
            Column::make('nominal_setor')->title('Nominal Setor'),
            Column::make('is_approved')
                ->title('Approved')
                ->searchable(true)
                ->orderable(true)
                ->width(100)
                ->addClass('text-center min-w-100px'),
//            Column::make('created_at'),
//            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Costumers_' . date('YmdHis');
    }
}
