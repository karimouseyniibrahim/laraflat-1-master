<?php

namespace App\Application\DataTables;

use App\Application\Model\DemandeShoprental;
use Yajra\Datatables\Services\DataTable;

class DemandeShoprentalsDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
             ->eloquent($this->query())
             ->addColumn('edit', 'admin.demandeshoprental.buttons.edit')
             ->addColumn('delete', 'admin.demandeshoprental.buttons.delete')
             ->addColumn('view', 'admin.demandeshoprental.buttons.view')
           //  ->addColumn('name', 'admin.demandeshoprental.buttons.langcol')
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = DemandeShoprental::query();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters(dataTableConfig());
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
              [
                  'name' => "id",
                  'data' => 'id',
                  'title' => adminTrans('curd' , 'id'),
             ],
             [
                'name' => 'artisan_id',
                'data' => 'artisan_id',
                'title' => 'artisan_id',
             ],
             [
                'name' => 'section_id',
                'data' => 'section_id',
                'title' => 'section_id',
             ],
             [
                'name' => 'shoprental_id',
                'data' => 'shoprental_id',
                'title' => 'shoprental_id',
             ],


             [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => adminTrans('curd' , 'view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                  'name' => 'edit',
                  'data' => 'edit',
                  'title' =>  adminTrans('curd' , 'edit'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                   'name' => 'delete',
                   'data' => 'delete',
                   'title' => adminTrans('curd' , 'delete'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Demandeshoprentaldatatables_' . time();
    }
}