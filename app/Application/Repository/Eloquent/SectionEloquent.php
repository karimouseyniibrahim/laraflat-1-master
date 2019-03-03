<?php
namespace App\Application\Repository\Eloquent;

use App\Application\Model\Section;
use App\Application\Model\Permission;
use App\Application\Model\Role;
use App\Application\Repository\InterFaces\SectionInterface;
use App\Application\Model\shoprental;

class SectionEloquent extends AbstractEloquent implements SectionInterface{

    public function __construct(Section $section)
    {
        $this->model = $section;
    }

    public function getData(){

    	$section=transformSelect(Section::pluck('name','id')->all());
    	$shoprental=transformSelect(shoprental::pluck('name','id')->all());
    	 $data=[
    		'section'=>$section,
    		'shoprental'=>$shoprental
    	];

    	return json_encode($data);
    
    }
     
}