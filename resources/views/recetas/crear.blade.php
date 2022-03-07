@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trix-editor/trix.css') }}">
@endsection

@section('botones')
    <a href="{{ route('receta.index') }}" class="float-right btn btn-primary">Volver</a>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mb-4">Crear Nueva Receta</h1>

                <form action="{{ route('receta.store') }}" method="post" enctype="multipart/form-data" novalidate>

                    @csrf

                    <div class="row">
                        {{-- Titulo --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="titulo">Titulo Receta</label>
                                <input id="titulo" class="form-control @error('titulo') is-invalid @enderror" type="text"
                                    name="titulo" value="{{ old('titulo') }}">

                                @error('titulo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        {{-- categorias --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="categoria">Categorias</label>
                                <select id="categoria" class="form-control @error('categoria') is-invalid @enderror"
                                    name="categoria">
                                    <option value="">-- Seleccionar Categoria --</option>

                                    @foreach ($categorias as  $categoria)
                                        <option {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                                            value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach

                                </select>

                                @error('categoria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- ingredientes --}}
                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <label for="ingredientes">Ingredientes</label>

                                <input type="hidden" value="{{ old('ingredientes') }}" name="ingredientes"
                                    id="ingredientes">

                                <trix-editor class="form-control @error('ingredientes') is-invalid @enderror"
                                    input="ingredientes"></trix-editor>

                                @error('ingredientes')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                        {{-- preparacion --}}
                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <label for="preparacion">Preparacion</label>

                                <input type="hidden" value="{{ old('preparacion') }}" name="preparacion"
                                    id="preparacion">

                                <trix-editor class="form-control @error('preparacion') is-invalid @enderror"
                                    input="preparacion"></trix-editor>

                                @error('preparacion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>

                        {{-- imagen --}}
                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <label for="imagen">imagen</label>

                                <input type="file" class="form-control @error('preparacion') is-invalid @enderror"
                                    value="{{ old('imagen') }}" name="imagen" id="imagen">


                                @error('imagen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>



                    </div>




                    <div class="d-flex justify-content-end">
                        <button class=" btn btn-primary" type="submit">Registrar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/trix-editor/trix.js') }}" defer></script>
@endsection
