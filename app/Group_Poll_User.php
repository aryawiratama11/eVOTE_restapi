<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_Poll_User extends Model
{
    protected $table = 'group_poll_user';

    protected $fillable = ['group_ID', 'poll_ID', 'user_ID'];

    public $timestamps=false;
}
