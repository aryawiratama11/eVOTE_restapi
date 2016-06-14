<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';

    protected $fillable = ['poll_ID', 'choice'];

    public $timestamps=false;
}
