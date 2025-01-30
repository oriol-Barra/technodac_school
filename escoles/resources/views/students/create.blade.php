@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Estudiante</h2>

        <!-- Formulario de creación de estudiante -->
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
                @error('apellidos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="escuela">Escuela</label>
                <select name="escuela" class="form-control">
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ old('escuela') == $school->id ? 'selected' : '' }}>
                            {{ $school->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('escuela')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                @error('fecha_nacimiento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ciudad_natal">Ciudad Natal</label>
                <input type="text" name="ciudad_natal" class="form-control" value="{{ old('ciudad_natal') }}">
                @error('ciudad_natal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
