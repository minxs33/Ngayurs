<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    public function User() {
        return $this -> belongsTo('App\User');
    }
    protected $primaryKey = 'pedagang_id';
}
