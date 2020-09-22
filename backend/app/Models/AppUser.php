<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    //
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
