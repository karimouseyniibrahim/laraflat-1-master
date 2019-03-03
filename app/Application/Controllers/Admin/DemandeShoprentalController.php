<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\DemandeShoprental\AddRequestDemandeShoprental;
use App\Application\Requests\Admin\DemandeShoprental\UpdateRequestDemandeShoprental;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\DemandeShoprentalsDataTable;
use App\Application\Model\DemandeShoprental;
use App\Application\Model\shoprental;
use App\Application\Repository\InterFaces\DemandeshoprentalsInterface;
use Yajra\Datatables\Request;
use Alert;

class DemandeShoprentalController extends AbstractController
{
    protected $demandeshoprentalsInterface;
    public function __construct(DemandeShoprental $model,DemandeshoprentalsInterface $demandeshoprentalsInterface)
    {
        parent::__construct($model);
        $this->demandeshoprentalsInterface=$demandeshoprentalsInterface;
    }

    public function index(DemandeShoprentalsDataTable $dataTable){
        return $dataTable->render('admin.demandeshoprental.index');
    }

    public function show($id = null){
        $data=$this->demandeshoprentalsInterface->getDataDemande($id);
        return $this->createOrEdit('admin.demandeshoprental.edit' , $id,['data'=>$data]);
    }

    public function store(AddRequestDemandeShoprental $request){
         return $this->storeOrUpdate($request , null , 'admin/demandeshoprental');
    }

    public function update($id , UpdateRequestDemandeShoprental $request){
             return $this->storeOrUpdate($request , $id , 'admin/demandeshoprental');
    }

    public function addstatus($id , UpdateRequestDemandeShoprental $request){
             return $this->storeOrUpdate($request , $id , 'admin/demandeshoprental');
    }
    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.demandeshoprental.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/demandeshoprental')->with('sucess' , 'Done Delete demandeshoprental From system');
    }

    public function getshoprental($id){

        $shoprental = shoprental::where('section_id',$id)->pluck('name','id')->all();
        return json_encode(transformSelect($shoprental)); 
    }
    public function getshoprentalinfos($id){
        $dinfos=shoprental::select('price','area')->find($id);
        return json_encode($dinfos);
    }
}
