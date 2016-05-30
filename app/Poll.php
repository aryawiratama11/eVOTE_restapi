<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'polls';

    public $timestamps=false;

    public function groups()
    {

        return $this->belongsToMany('App\Group','group_poll_user');

    }

    public function users()
    {
        return $this->belongsToMany('App\User','group_poll_user');
    }

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    
}
