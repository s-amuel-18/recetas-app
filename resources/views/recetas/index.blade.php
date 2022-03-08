@extends('layouts.app')

@section('botones')
    <div class="container mb-3 ">
        <a href="{{ route('receta.crear') }}" class="float-right btn btn-primary">Nueva Receta</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Recetas</h1>

        @if ( count( $recetas ) > 0 )
        <table class="table ">
            <thead class="bg-dark text-light">
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Creacion</th>
                    <th>Actualizacion</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($recetas as $i => $receta)
                    <tr>
                        <td> {{ $i + 1 }} </td>
                        <td> {{ $receta->titulo }} </td>
                        <td> {{ $receta->categoria->nombre }} </td>
                        <td>
                            <fecha-custom fecha="{{ $receta->created_at }}"></fecha-custom>
                        </td>
                        <td>
                            <fecha-custom fecha="{{ $receta->updated_at }}"></fecha-custom>

                        </td>
                        <td style="width: 120px;">
                            <a href=" {{ route('receta.show', ['receta' => $receta->id]) }} " class="btn btn-info btn-sm">
                                <i class="fas fa-square-arrow-up-right "></i>
                            </a>

                            <a href=" {{ route('receta.edit', ['receta' => $receta->id]) }} "
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form onsubmit="return confirm('¿Realmente desea eliminar esta receta?')" action="{{ route('receta.delete', ['receta' => $receta->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method("delete")

                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>



                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>

        @else
            <h1 class="text-center">No hay recetas registradas <a href="{{ route("receta.crear") }}">Crear Receta</a></h1>
        @endif

    </div>
@endsection
