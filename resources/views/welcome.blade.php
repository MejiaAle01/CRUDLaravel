@extends('plantilla/plantilla')

@section('tituloPagina', 'CRUD Laravel')
    
@section('contenido')
    <div class="container-fluid">
        <br>
        <div class="card">
            <h5 class="card-header"> CRUD con Laravel 9 y MySQL </h5>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <p>
                    <a href="{{ route('personas.create') }}" class="btn btn-primary"> Agregar </a>
                </p>
                <hr>
                <div class="table-responsive xxl">
                    <table class="table table-striped table-hover caption-top">
                        <caption> Listado de personas en el sistema </caption>
                        <thead>
                            <tr>
                                <th> Nombre </th>
                                <th> Apellido </th>
                                <th> Fecha de nacimiento </th>
                                <th> Opciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $persona)
                                <tr>
                                    <td> {{ $persona->nombre }} </td>
                                    <td> {{ $persona->apellido }} </td>
                                    <td> {{ $persona->fecha_nacimiento }} </td>
                                    <td>
                                        <a href="{{ route('personas.edit', encrypt($persona->id)) }}" class="btn btn-success">
                                            <i class="bi-pencil-square"></i>
                                        </a>
                                        <a href="{{ route('personas.show', encrypt($persona->id)) }}" class="btn btn-danger">
                                            <i class="bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item"> {{ $datos->links() }} </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- <h1> Cargando contenido </h1>
        {{-- $datos; --}}
        <a href="{{-- route('personas.create') --}}" class="btn btn-primary"> Agregar </a> -->
    </div>
@endsection