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
			<button type="submit" class="btn btn-primary mt-3">Guardar Edicion</button>
</form>
@endsection	
