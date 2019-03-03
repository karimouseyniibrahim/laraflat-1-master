<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Inscription\AddRequestInscription;
use App\Application\Requests\Admin\Inscription\UpdateRequestInscription;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\InscriptionsDataTable;
use App\Application\Model\Inscription;
use App\Application\Model\Formations;
use App\Application\Repository\InterFaces\InscriptionInterface;
use Yajra\Datatables\Request;
use Alert;

class InscriptionController extends AbstractController
{
    protected $inscriptionInterface;
    public function __construct(Inscription $model, InscriptionInterface $inscriptionInterface)
    {
        parent::__construct($model);
        $this->inscriptionInterface=$inscriptionInterface;
    }



    public function index(InscriptionsDataTable $dataTable){
        return $dataTable->render('admin.inscription.index');
    }

    public function show($id = null){
        $data=$this->inscriptionInterface->getformations($id);
 
        return $this->createOrEdit('admin.inscription.edit' , $id,['data'=>$data]);
    }

    public function store(AddRequestInscription $request){
         return $this->storeOrUpdate($request , null , 'admin/inscription');
    }

    public function update($id , UpdateRequestInscription $request){
             return $this->storeOrUpdate($request , $id , 'admin/inscription');
    }
    public function getformationinfos($id ){
            $item=Formations::select('price','places','debut_formation','fin_formation')->find($id);    
             return json_encode($item);
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.inscription.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/inscription')->with('sucess' , 'Done Delete inscription From system');
    }
}
