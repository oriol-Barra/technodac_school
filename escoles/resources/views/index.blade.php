<!-- resources/views/index.blade.php -->
@extends('layouts.app')
@section('content')


<div class="container mt-5">
    <h1>Bienvenido a la gestión de Escuelas y Estudiantes</h1>
    
    <div class="mt-4">
        <!-- Contenedor para alinear los botones horizontalmente -->
        <div class="d-flex gap-3">
            <!-- Botón para ir a la página de escuelas -->
            <a href="{{ route('schools.index') }}" class="btn btn-primary">Ir a Escuelas</a>
            <!-- Botón para ir a la página de estudiantes -->
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Ir a Estudiantes</a>
        </div>
    </div>
</div>


@endsection
