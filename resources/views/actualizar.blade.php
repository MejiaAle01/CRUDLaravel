@extends('plantilla/plantilla')

@section('tituloPagina', 'Crear nuevo registro')

@section('contenido')
    <div class="container">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <h5 class="card-header"> Actualizar datos </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <form method="POST" action="{{ route('personas.update', $personas->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">
                                        Nombre
                                        <input type="text" class="form-control" name="nombre" required value="{{ $personas->nombre }}">
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Apellido
                                        <input type="text" class="form-control" name="apellido" required value="{{ $personas->apellido }}">
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Fecha de nacimiento
                                        <input type="date" class="form-control" name="fechaNac" required value="{{ $personas->fecha_nacimiento }}">
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary"> Actualizar </button>
                                <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary"> Regresar </a>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection