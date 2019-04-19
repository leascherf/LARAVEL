@extends('layouts.app')

@section('title','Editor de entrenador')

@section('content')

{{-- Asigno al nombre el value con el nombre del entrenador para que lo cargue automaticamente 
 Cambio la accion agregando el slug 
Y agrego el @method put --}}
<form  class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="form-group">
			<img  style="height: 350px; width: 350px; background-color:#EFEFEF; margin: 20px " class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}">
			<label for="">Nombre</label>
			<input type="text" name="name"  value="{{$trainer->name}}" class="form-control"></input>
	</div>
		<div class="form-group">
			<label for="">Slug</label>
			<input type="text" name="slug"  value="{{$trainer->slug}}" class="form-control"></input>
	</div>
	<div class="form-group">
			<label for="">Avatar</label>
			<input type="file" name="avatar"></input>			
	</div>
			<button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>
			{{-- Para poder eliminar tengo que pasar el metodo DELETE es por esto que es necesario seguir esta sintaxis --}}
			 <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}">
		        @csrf
		        @method('DELETE')
		        <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
		   		 </form>﻿

@endsection	

