<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desks extends Model
{
   protected $table = 'descs';
    public $timestamps = false;
   public function tasks () {
       return $this->hasMany('App\Tasks');
   }
}
