<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public $table='comments';
    public function article(){
        $this->belongsTo('App\Article');
    }
}
