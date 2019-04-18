@extends('layouts.app')

@section('title','Entrenadores')

@section('content')
<form  class="form-group" method="POST" action="/trainers">
	@csrf
	<div class="form-group">
				<label for="">Nombre</label>
				<input type="text" name="name" class="form-control"></input>
			</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection	
