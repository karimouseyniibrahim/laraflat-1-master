<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Section\AddRequestSection;
use App\Application\Requests\Admin\Section\UpdateRequestSection;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SectionsDataTable;
use App\Application\Model\Section;
use App\Application\Model\shoprental;
use App\Application\Repository\InterFaces\SectionInterface;
use Yajra\Datatables\Request;
use Alert;

class SectionController extends AbstractController
{

    protected $sectionInterface;
    public function __construct(Section $model,SectionInterface $sectionInt)
    {

        parent::__construct($model);

   
        //this->sectionInterface=$sectionInt;
    }

    public function index(SectionsDataTable $dataTable){
        return $dataTable->render('admin.section.index');
    }

    public function show($id = null){
       // $data=this->sectionInterface->getData();
        return $this->createOrEdit('admin.section.edit' , $id);
    }

    public function store(AddRequestSection $request){
         return $this->storeOrUpdate($request , null , 'admin/section');
    }

    public function update($id , UpdateRequestSection $request){
             return $this->storeOrUpdate($request , $id , 'admin/section');
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.section.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/section')->with('sucess' , 'Done Delete section From system');
    }

    public function getshoprental(){

        $shoprental=shoprental::where ( 'section_id',$id)->pluck('id','name')->all();
        $total=$shoprental->count();

        $data=[
            'shoprental'=>transformSelect($shoprental),
            'total'=>$total
        ]; 

        return json_encode($data);
    }
}
