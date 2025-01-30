@extends('layouts.app')

@section('content')
    <h1>Lista de Estudiantes</h1>

    <!-- Mostrar la lista de estudiantes -->
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Escuela</th>
                <th>fecha de nacimiento</th>
                <th>escuela</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->nombre }}</td>
                    <td>{{ $student->apellidos }}</td>
                    <td>{{ $student->ciudad_natal }}</td>
                    <td>{{ $student->fecha_nacimiento}}</td>
                    <td>{{ $student->school->nombre }}</td> <!-- Relación con la escuela -->
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('students.create') }}" class="btn btn-warning">Crear Nuevo Estudiante</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginar los resultados -->
    <div class="d-flex justify-content-center">
    {{ $students->links('pagination::bootstrap-4') }}
    </div>
    <div>           
      <a href="{{ route('index') }}" class="btn btn-primary">vuelve al panel de gestion</a>
    </div>
@endsection
