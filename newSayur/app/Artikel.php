<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public function User() {
        return $this -> belongsTo('App\User');
    }
    protected $primaryKey = 'artikel_id';
}
