<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $table = 'users';
    
    public function descs() {
    return $this->hasMany('App\Desks');
  }
}
