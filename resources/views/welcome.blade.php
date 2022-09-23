@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>CRUD CURSOS</h1>
        <a href= "{{ route ('client.index') }}" class="btn btn-primary">Listado estudiantes</a>
        <a href= "{{ route ('profesor.index') }}" class="btn btn-primary">Listado profesores</a>
    </div>
@endsection
