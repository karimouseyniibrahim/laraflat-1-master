<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

  public $table = "contacts";


   protected $fillable = [
   	'name', 'email', 'subject',  'message' 
   ];

}
