<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\shoprental\AddRequestshoprental;
use App\Application\Requests\Admin\shoprental\UpdateRequestshoprental;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\shoprentalsDataTable;
use App\Application\Model\shoprental;
use App\Application\Model\Section;
use Yajra\Datatables\Request;
use Alert;

class shoprentalController extends AbstractController
{
    public function __construct(shoprental $model)
    {
        parent::__construct($model);
    }

    public function index(shoprentalsDataTable $dataTable){
        return $dataTable->render('admin.shoprental.index');
    }

    public function show($id = null){
        $section=transformSelect(Section::pluck('name','id')->all());
        return $this->createOrEdit('admin.shoprental.edit' , $id,['section'=>$section]);
    }

    public function store(AddRequestshoprental $request){
         return $this->storeOrUpdate($request , null , 'admin/shoprental');
    }

    public function update($id , UpdateRequestshoprental $request){
             return $this->storeOrUpdate($request , $id , 'admin/shoprental');
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.shoprental.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/shoprental')->with('sucess' , 'Done Delete shoprental From system');
    }

    
}
