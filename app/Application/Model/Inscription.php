<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

  public $table = "inscriptions";


   protected $fillable = [
   		'numero_artisan','name','email','adresse','telephone','status','formations_id'
   ];

   public $timestamps=true;
  public function   validation ($id){
	     return  [
	     		 
	     		'name'=>'required',
	     		'telephone'=>'required',	     		
	     		'formations_id'=>'required'
	       ];
	}

	public function   updateValidation ($id){
		return  [				 
	     		'name'=>'required',
	     		'telephone'=>'required',	     		
	     		'formations_id'=>'required'
		];
	}

	public function formations(){
       return $this->belongsTo('App\Application\Model\Formations','formations_id');
   }
}
