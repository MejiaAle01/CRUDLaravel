@extends('plantilla/plantilla')

@section('tituloPagina', 'Crear nuevo registro')

@section('contenido')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header"> Eliminar datos </h5>
            <div class="card-body">
                <p class="card-text">
                    <div class="alert alert-danger" role="alert">
                        ¿Está seguro de que desea eliminar este registro?
                        <p>
                            <span> Nombre: <b> {{ $persona->nombre }} </b></span>
                            <br>
                            <span> Apellido: <b> {{ $persona->apellido }} </b></span>
                            <br>
                            <span> Fecha de nacimiento: <b> {{ $persona->fecha_nacimiento }} </b></span>
                        </p>
                    </div>
                </p>
                <form action="{{ route('personas.destroy', $persona->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Eliminar </button>
                    <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary"> Regresar </a>
                </form>
            </div>
        </div>
    </div>
@endsection