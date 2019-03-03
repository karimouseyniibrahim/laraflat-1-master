<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

  public $table = "sections";


   protected $fillable = [
   		'name','details'
   ];

   	public $timestamps=true;
	public function   validation ($id){
	     return  [
	     		'name'=>'required:|unique:sections',
	     		'details'=>'required'
	       ];
	}

	public function   updateValidation ($id){
		return  [
				'name'=>'required:|unique:sections,name,'.$id,
				'details'=>'required'
		];
	}

	public static function getcountshoprentalBySection(){
		return  $this->withCount('shoprental')->get();
	}


	public function shoprental(){
       return $this->hasMany('App\Application\Model\shoprental');
  }
}
