@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trix-editor/trix.css') }}">
@endsection

@section('botones')
@endsection

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Editar Perfil</h1>
        </div>

        <form method="POST" action="{{ route('perfil.update', ['perfil' => $perfil->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">

                {{-- Nombre --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">

                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control @error('nombre') is-invalid @enderror" type="text"
                            name="nombre" value="{{ old('nombre') ? old('nombre') : $perfil->usuario->name }}">

                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                {{-- pagina_web --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">

                        <label for="pagina_web">Pagina Web</label>
                        <input id="pagina_web" class="form-control @error('pagina_web') is-invalid @enderror" type="text"
                            name="pagina_web"
                            value="{{ old('pagina_web') ? old('pagina_web') : $perfil->usuario->pagina_web }}">

                        @error('pagina_web')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                {{-- imagen --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">

                        <label for="imagen">Imagen</label>
                        <input id="imagen" class="form-control @error('imagen') is-invalid @enderror" type="file"
                            name="imagen">

                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>


                {{-- biografia --}}
                <div class="col-md-12">
                    <div class="form-group mb-3">

                        <label for="biografia">biografia</label>

                        <input type="hidden" value="{{ old('biografia') ? old('biografia') : $perfil->biografia }}"
                            name="biografia" id="biografia">

                        <trix-editor class="form-control @error('biografia') is-invalid @enderror" input="biografia">
                        </trix-editor>

                        @error('biografia')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>





            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/trix-editor/trix.js') }}" defer></script>
@endsection
