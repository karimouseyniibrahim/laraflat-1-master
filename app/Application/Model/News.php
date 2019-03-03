<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

  public $table = "news";


   protected $fillable = [
   		'name','subject','details','image'
   ];

 

}
