@extends('layouts.app')

@section('botones')
    <a href="{{ route('receta.index') }}" class="float-right btn btn-primary">Volver</a>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Nueva Receta</h1>



        <form action="{{ route('receta.store') }}" method="post" novalidate>

            @csrf

            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input id="titulo" class="form-control @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{ old("titulo") }}">

                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="d-flex justify-content-end">
                <button class=" btn btn-primary" type="submit">Registrar</button>

            </div>

        </form>
    </div>
@endsection
