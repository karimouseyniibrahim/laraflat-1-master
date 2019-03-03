<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class shoprental extends Model
{

  public $table = "shoprentals";


   protected $fillable = [
   		'name' ,'details','price','area','image','section_id'
   ];
  public $timestamps=true;
  public function   validation ($id){
	     return  [
	     		'name'=>'required:|unique:shoprentals',
	     		'details'=>'required',
	     		'price'=>'required',
	     		'area'=>'required',
	     		'image'=>'required',
	     		'section_id'=>'required'
	       ];
	}

	public function   updateValidation ($id){
		return  [
				'name'=>'required:|unique:shoprentals,name,'.$id,
				'details'=>'required',
	     		'price'=>'required',
	     		'area'=>'required',
	     		'image'=>'required',
	     		'section_id'=>'required'
		];
	}

	public function section(){
       return $this->belongsTo('App\Application\Model\Section','section_id');
   }


}
