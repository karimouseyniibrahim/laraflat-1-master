<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Formations extends Model
{

  public $table = "formations";


   protected $fillable = [
   		'libeler','details','price','places','debut_formation','fin_formation','image'
   ];
  public $timestamps=true;
  public function   validation ($id){
	     return  [
	     		'libeler'=>'required|unique:formations',
	     		'details'=>'required',
	     		'price'=>'required',
	     		'places'=>'required',
	     		'debut_formation'=>'required',
	     		'fin_formation'=>'required',
	     		'image'=>'required'
	     		 
	     		
	       ];
	}

	public function   updateValidation ($id){
		return  [
				'libeler'=>'required|unique:formations,libeler,'.$id,
	     		'details'=>'required',
	     		'price'=>'required',
	     		'places'=>'required',
	     		'debut_formation'=>'required',
	     		'fin_formation'=>'required',
	     		'image'=>'required'
	     		 
		];
	}

public function inscription(){
       return $this->hasMany('App\Application\Model\Inscription');
  }
}
