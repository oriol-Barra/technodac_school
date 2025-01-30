@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Escuela</h2>

        <form action="{{ route('schools.update', $school->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $school->nombre) }}">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $school->direccion) }}">
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if($school->logo)
                    <img src="{{ asset('storage/' . $school->logo) }}" alt="Logo" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $school->email) }}">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $school->telefono) }}">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" name="website" class="form-control" value="{{ old('website', $school->website) }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Escuela</button>
        </form>
    </div>
@endsection
