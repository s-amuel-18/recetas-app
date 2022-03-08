@extends('layouts.app')

@section('botones')
    <div class="container mb-3 ">
        <a href="{{ route('receta.index') }}" class="float-right btn btn-primary">Volver</a>
        <a href="{{ route('receta.edit', ["receta" => $receta->id ]) }}" class="float-right btn btn-warning">Editar</a>
    </div>
@endsection

@section('content')

    <article class="container ">

        <h1 class="text-center mb-4"> {{ $receta->titulo }} </h1>

        <img class="w-100" src="{{ env("APP_URL")."/storage/".$receta->imagen }}" alt="">

        <fecha-custom fecha="{{ $receta->created_at }}"></fecha-custom>

        <div class="p-2">
            <small>Categoria: {{ $receta->categoria->nombre }} </small>
        </div>
        <div class="p-2">
            <small>Autor: {{ $receta->autor->name }} </small>
        </div>

        <div class="mb-3">

            <h2> Ingredientes </h2>

            <p> {!! $receta->ingredientes !!} </p>

        </div>

        <div class="mb-3">

            <h2> Preparacion </h2>

            <p> {!! $receta->preparacion !!} </p>

        </div>
    </article>

@endsection
