@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        @if (isset($profesor))
            <h1>Editar profesor</h1>
        @else
            <h1>Crear profesor</h1>
        @endif

        @if(isset($profesor))
            <form action="{{ route ('profesor.update', $profesor) }}" method="POST">
                @method('PUT');
        @else
            <form action="{{ route ('profesor.store') }}" method="POST">
        @endif
        
        <form action="{{ route ('profesor.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" 
                placeholder="Nombre Del Profesor" value="{{old('name') ?? @$profesor->name}}">
                <p class="form-text">Escriba el nombre del profesor</p>
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" 
                placeholder="" value="{{old('correo') ?? @$profesor->correo}}">
                <p class="form-text">Escriba su correo</p>
                @error('correo')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Programa académico</label>
                <input type="text" name="ocupacion" class="form-control" 
                placeholder="Ocupación" value="{{old('ocupacion') ?? @$profesor->ocupacion}}">
                <p class="form-text">Escriba la ocupacion</p>
                @error('ocupacion')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            @if(isset($profesor))
                <button type="submit">Editar Profesor</button>
            @else
                <button type="submit">Guardar Profesor</button>
            @endif            
        </form> 
            
    </div>
@endsection