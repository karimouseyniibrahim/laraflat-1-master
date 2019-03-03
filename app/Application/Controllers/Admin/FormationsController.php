<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Formations\AddRequestFormations;
use App\Application\Requests\Admin\Formations\UpdateRequestFormations;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\FormationssDataTable;
use App\Application\Model\Formations;
use Yajra\Datatables\Request;
use Alert;

class FormationsController extends AbstractController
{
    public function __construct(Formations $model)
    {
        parent::__construct($model);
    }

    public function index(FormationssDataTable $dataTable){
        return $dataTable->render('admin.formations.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.formations.edit' , $id);
    }

    public function store(AddRequestFormations $request){
         return $this->storeOrUpdate($request , null , 'admin/formations');
    }

    public function update($id , UpdateRequestFormations $request){
             return $this->storeOrUpdate($request , $id , 'admin/formations');
    }

    
    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.formations.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/formations')->with('sucess' , 'Done Delete formations From system');
    }
}
