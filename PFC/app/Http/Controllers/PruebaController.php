<?php
namespace PFC\Http\Controllers;
use PFC\Http\Controllers\Controller;
class PruebaController extends Controller 
{
    public function prueba($parametro){
    	return 'estoy dentro de prueba controller y recibi este parametro '. $parametro;
    }
}