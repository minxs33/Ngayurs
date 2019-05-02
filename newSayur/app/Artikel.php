<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'posts';
    public function User() {
        return $this -> belongsTo('App\User');
    }
    protected $primaryKey = 'artikel_id';
}
