@extends('layouts.app')

@section('title','Entrenadores')

@section('content')
	@if ($errors->any())
		<div class="alert alert-primary mt-1" role="alert">
			@foreach($errors->all() as $error)
		  		<p>{{$error}}</p>
			@endforeach
		</div>
	@endif

<form  class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
	@csrf
			@include('trainers.form')
			<button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>
@endsection	
