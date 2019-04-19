@extends('layouts.app')

@section('title','Entrenadores')

@section('content')

@include('common.errors')

<form  class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
	@csrf
			@include('trainers.form')
			<button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>
@endsection	
