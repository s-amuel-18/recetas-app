@extends('layouts.app')

@section('botones')
    <div class="container mb-3 ">
        <a href="{{ route('receta.crear') }}" class="float-right btn btn-primary">Nueva Receta</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-4">Recetas</h1>

        <table class="table ">
            <thead class="bg-dark text-light">
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($recetas as $i => $receta)
                    <tr>
                        <td> {{ $i + 1 }} </td>
                        <td> {{ $receta->titulo }} </td>
                        <td> {{ $receta->categoria->nombre }} </td>
                        <td style="width: 120px;">
                            <a href="" class="btn btn-info btn-sm">
                                <i class="fas fa-square-arrow-up-right "></i>
                            </a>

                            <a href="" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-trash"></i>
                              </button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
