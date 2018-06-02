<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public $table ='articles';
    public function comments(){
        $this->hasMany('App\Comment');
    }

    public function users(){
        $this->belongsTo('App\User');
    }
}
