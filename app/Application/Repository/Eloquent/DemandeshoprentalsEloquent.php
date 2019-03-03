<?php
namespace App\Application\Repository\Eloquent;

use App\Application\Model\Demandeshoprental;
use App\Application\Model\Section;
use App\Application\Model\shoprental;
use App\Application\Repository\InterFaces\DemandeshoprentalsInterface;


class DemandeshoprentalsEloquent extends AbstractEloquent implements DemandeshoprentalsInterface{

    public function __construct(Demandeshoprental $demandeshoprental)
    {
        $this->model = $demandeshoprental;
    }



public function getDataDemande($id){

        $sections=transformSelect(Section::pluck('name','id')->all());        

        if ($id!=null) {

            $item=$this->model->find($id);

            $shoprentals=transformSelect(shoprental::where('section_id',$item->section_id)->pluck('name','id')->all());
            $dinfos=shoprental::find($item->shoprental_id);
            $price=$dinfos->price;
            $area=$dinfos->area;

            
        }else{
            $shoprentals=[];
            $user_id=null;
            $price=null;
            $area=null;

        }

        return $data=[
            'section'=>$sections,
            'shoprental'=>$shoprentals,
            'price'=>$price,
            'area'=>$area
        ];
    }

}