@extends('layouts.app')

@section('content')
    <h1>Lista de Escuelas</h1>

    <!-- Mostrar la lista de escuelas -->
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>logotipo</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>teléfono</th>
                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school->nombre }}</td>
                    <td>
                        @if($school->logo)
                            <img src="{{ asset('storage/' . $school->logo) }}" alt="School Logo"/>
                        @else
                            <span>No hi ha logo disponible</span> 
                        @endif
                    </td>
                    <td>{{ $school->direccion }}</td>
                    <td>{{ $school->email }}</td>
                    <td>{{ $school->telefono }}</td>
                    <td>
                      <!-- Botón para ver los estudiantes de esta escuela -->
                      <a href="{{ route('students.bySchool', $school->id) }}" class="btn btn-info">Ver Estudiantes</a>
                    </td>

                    <td>
                        <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('schools.create') }}" class="btn btn-warning">Crear Nueva Escuela</a>
                        <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline;">
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
     {{ $schools->links('pagination::bootstrap-4') }}
    </div>
    <div>           
      <a href="{{ route('index') }}" class="btn btn-primary">vuelve al panel de gestion</a>
    </div>
@endsection
