<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamp = false;

    /**
    * Get users with a certain role
    */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role_pivot');
    }
}
