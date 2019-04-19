<?php

namespace PFC;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
	//debo especificar los campos que se podran modificar
	protected $fillable= ['name','avatar'];

	
    public function getRouteKeyName(){
    	return 'slug';
    }
}
