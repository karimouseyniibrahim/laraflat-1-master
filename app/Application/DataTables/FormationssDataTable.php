<?php

namespace App\Application\DataTables;

use App\Application\Model\Formations;
use Yajra\Datatables\Services\DataTable;

class FormationssDataTable extends DataTable
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
             ->addColumn('edit', 'admin.formations.buttons.edit')
             ->addColumn('delete', 'admin.formations.buttons.delete')
             ->addColumn('view', 'admin.formations.buttons.view')
            // ->addColumn('name', 'admin.formations.buttons.langcol')
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Formations::query();

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
                'name' => "libeler",
                'data' => 'libeler',
                'title' => adminTrans('formations' , 'libeler'),
             ],
             [
                'name' => "places",
                'data' => 'places',
                'title' => adminTrans('formations' , 'places'),
             ],
             [
                'name' => "price",
                'data' => 'price',
                'title' => adminTrans('formations' , 'price'),
             ],
             [
                'name' => "debut_formation",
                'data' => 'debut_formation',
                'title' => adminTrans('formations' , 'debut_formation'),
             ],
             [
                'name' => "fin_formation",
                'data' => 'fin_formation',
                'title' => adminTrans('formations' , 'fin_formation'),
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
        return 'Formationsdatatables_' . time();
    }
}