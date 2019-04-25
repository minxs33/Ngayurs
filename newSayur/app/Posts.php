<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'user_id','thumbnail','judul','deskripsi','penulis',
    ];
    protected $table = 'posts';
    protected $primaryKey = 'artikel_id';
}
