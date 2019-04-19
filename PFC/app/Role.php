<?php

namespace PFC;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    publi function Users(){
    return $this->belongsToMany('App\User');
}
}
