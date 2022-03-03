@extends('layouts.app')

@section('botones')
    <div class="container mb-3 ">
        <a href="{{ route("receta.crear") }}" class="float-right btn btn-primary" >Nueva Receta</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1>Recetas</h1>
    </div>
@endsection
