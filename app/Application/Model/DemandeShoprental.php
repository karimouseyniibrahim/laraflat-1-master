<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class DemandeShoprental extends Model
{

  public $table = "demandeshoprentals";


   protected $fillable = [
   		'artisan_id','section_id','shoprental_id','artisan_email','status'
   ];

  public $timestamps=true;
  public function   validation ($id){
	     return  [
	     		'artisan_id'=>'required|min:1|max:200',
	     		'section_id'=>'required',
	     		'shoprental_id'=>'required',
	     		'artisan_email'=>'required|min:5|max:700'
	     		 
	     		
	       ];
	}

	public function   updateValidation ($id){
		return  [
				'artisan_id'=>'required|min:1|max:200',
	     		'section_id'=>'required',
	     		'shoprental_id'=>'required',
	     		'artisan_email'=>'required|min:5|max:700'
	     		 
		];
	}

	

}
