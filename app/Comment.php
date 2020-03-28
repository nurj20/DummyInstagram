<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded =[];

    public function post(){
        return $this->belondsTo(\App\Post::class);
    }
}
