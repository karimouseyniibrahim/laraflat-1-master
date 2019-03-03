<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Artisans extends Model
{

  public $table = "artisans";


   protected $fillable = [
   		'numero_artisant','name_artisant','email_artisan','adresse_artisan','telephone_artisan'
   ];

public $timestamps=true;
  public function   validation ($id){
	     return  [
	     		'numero_artisant'=>'required:|min:1|max:200|unique:artisans',
	     		'name_artisant'=>'required|min:10|max:600',
	     		'email_artisan'=>'required|min:10|max:700|unique:artisans',
	     		'adresse_artisan'=>'required|min:10|max:250',
	     		'telephone_artisan'=>'required|min:8|max:20'
	       ];
	}

	public function   updateValidation ($id){
		return  [
				
				'numero_artisant'=>'required:|min:1|max:200|unique:artisans',
	     		'name_artisant'=>'required|min:10|max:600',
	     		'email_artisan'=>'required|min:10|max:700|unique:artisans',
	     		'adresse_artisan'=>'required|min:10|max:250',
	     		'telephone_artisan'=>'required|min:8|max:20'
		];
	}

	public function section(){
       return $this->belongsTo('App\Application\Model\Section','section_id');
   }

}
