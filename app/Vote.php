<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    
    
    
    public $timestamps=false;

    public function choice(){
        return $this->belongsTo('App\Choice');
    }
}
