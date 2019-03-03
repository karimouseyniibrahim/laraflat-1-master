<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Artisans\AddRequestArtisans;
use App\Application\Requests\Admin\Artisans\UpdateRequestArtisans;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\ArtisanssDataTable;
use App\Application\Model\Artisans;
use Yajra\Datatables\Request;
use Alert;

class ArtisansController extends AbstractController
{
    public function __construct(Artisans $model)
    {
        parent::__construct($model);
    }

    public function index(ArtisanssDataTable $dataTable){
        return $dataTable->render('admin.artisans.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.artisans.edit' , $id);
    }

    public function store(AddRequestArtisans $request){
         return $this->storeOrUpdate($request , null , 'admin/artisans');
    }

    public function update($id , UpdateRequestArtisans $request){
             return $this->storeOrUpdate($request , $id , 'admin/artisans');
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.artisans.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/artisans')->with('sucess' , 'Done Delete artisans From system');
    }
}
