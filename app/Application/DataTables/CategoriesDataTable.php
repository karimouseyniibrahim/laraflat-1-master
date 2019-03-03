<?php

namespace App\Application\DataTables;

use App\Application\Model\Categorie;
use Yajra\Datatables\Services\DataTable;

class CategoriesDataTable extends DataTable
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
             ->addColumn('edit', 'admin.categorie.buttons.edit')
             ->addColumn('delete', 'admin.categorie.buttons.delete')
             ->addColumn('view', 'admin.categorie.buttons.view')
            ->addColumn('name', 'admin.categorie.buttons.langcol')
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Categorie::query();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
          $html =  $this->builder()
                    ->columns($this->getColumns())
                    ->parameters(dataTableConfig());
          if(getCurrentLang() == 'ar'){
              $html = $html->parameters([
                  'language' => [
                      'url' => url('/vendor/datatables/arabic.json')
                   ]
              ]);
          }
            return $html;
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
                'name' => "name",
                'data' => 'name',
            ],

             [
                  'name' => "view",
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
                  'title' => adminTrans('curd' , 'edit'),
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
        return 'Categoriedatatables_' . time();
    }
}