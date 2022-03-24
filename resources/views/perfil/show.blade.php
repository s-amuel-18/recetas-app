@extends('layouts.app')

@section('styles')
@endsection

@section('botones')

    @if ( auth()->user() AND (Auth::user()->id == $perfil->user_id) )
        {{-- <button class="btn btn-primary" type="button">Editar</button> --}}
        <a class="btn btn-primary" href="{{ route("receta.index") }}">Recetas</a>
        <a class="btn btn-success" href="{{ route("perfil.edit", ["perfil" => $perfil->id]) }}">Editar Perfil</a>
    @endif

@endsection

@section('content')

    <div class="container">
        {{-- {{$perfil}} --}}

        <div class="d-flex justify-content-center">
            <img style="width: 200px" class="rounded-circle" src="{{ asset( "/storage/".($perfil->imagen ? $perfil->imagen :  "recursos/perfil.webp") ) }}" alt="">
        </div>

        <div class="text-center mt-4">
            <h3 class=""> {{ $perfil->usuario->name }} </h3>
            <p> {!! $perfil->biografia ? $perfil->biografia : "Sin Biografia" !!} </p>
        </div>


        {{-- recetas --}}

        <div class="row">

            @foreach ($recetas as $receta)

            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset( "/storage/".$receta->imagen ) }}" class="w-100" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('receta.show', ['receta' => $receta->id]) }}">{{$receta->titulo}}</a>
                        </h5>
                        <p class="card-text">
                            {!! $receta->preparacion !!}
                        </p>
                    </div>

                </div>
            </div>

            @endforeach


        </div>
    </div>



@endsection

@section('scripts')
@endsection
