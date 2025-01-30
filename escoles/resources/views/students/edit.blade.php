@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Estudiante</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $student->nombre) }}">
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $student->apellidos) }}">
            </div>

            <div class="form-group">
                <label for="ciudad_natal">Ciudad Natal</label>
                <input type="text" name="ciudad_natal" class="form-control" value="{{ old('ciudad_natal', $student->ciudad_natal) }}">
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $student->fecha_nacimiento) }}">
            </div>

            <div class="form-group">
                <label for="escuela">Escuela</label>
                <select name="escuela" class="form-control">
                    @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ old('escuela', $student->escuela) == $school->id ? 'selected' : '' }}>{{ $school->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar Estudiante</button>
        </form>
    </div>
@endsection
