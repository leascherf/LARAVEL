<?php

namespace PFC;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


public function roles(){
    return $this->belongsToMany('PFC\Role');
}

//nos falta una capa de interaccion mas directa
//este sera el que desencadene todo el proceso
public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)){
                return true;
        }
        //si no se cumple tendremos que decirle al usuario que algo anda mal entonces uso ABORT() y genero una excepcion http
        
        abort(401,'Esta accion no esta autirozada');
}

//creo una funcion para ver si tiene algun rol ya que tiene mas un rol el usuario
public function hasAnyRole($roles){
    //lo trataremos de dos formas ya que puedo recibir un arreglo de roles o solo puedo recibir un arreglo
    //si es un array hacemos esto
    if (is_array($roles)){
        foreach ($roles as $role) {
           if($this->hasRole($role)){
            return true;
             }  
        }
    //de lo contrario 
    }else {
        //llamamos a la funcion que tenemos abajo y retornamos un true
        if($this->hasRole($roles)){
            return true;
        }
    }
    //y en caso de que no tenga nada retorno un falso
    return false;
}

//funcion para validar si el usuario tiene este rol
public function hasRole($role){
    //un usuario puede tener mas de un rol
    //la validacion para ver si el usario tiene ese rol asignado
    //si en este modelo actual seria el usuario dentro de su relacion con roles donde le pasamos su nombre si existe me mande el primero que encuentre
    if ($this->roles()->where('name', $role)->first()){
        return true;
    }
         return false;
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
