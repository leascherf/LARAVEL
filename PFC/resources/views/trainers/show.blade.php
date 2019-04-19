@extends('layouts.app')

@section('title','Entrenador')

@section('content')
@if(session('status'))
<div class="alert alert-success" role="alert">
{{session('status')}}
</div>
@endif
<img  style="height: 300px; width: 300px; background-color:#EFEFEF; margin: 20px " class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}">
<div class="text-center">
	<h5 class="card-title">{{$trainer -> name}}</h5>
	<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<a href="/trainers/{{$trainer ->slug}}/edit" class="btn btn-primary">Editar</a>
</div>
@endsection