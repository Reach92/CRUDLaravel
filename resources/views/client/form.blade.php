@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1>Editar estudiante</h1>
        @else
            <h1>Crear estudiante</h1>
        @endif

        @if(isset($client))
            <form action="{{ route ('client.update', $client) }}" method="POST">
                @method('PUT');
        @else
            <form action="{{ route ('client.store') }}" method="POST">
        @endif
        
        <form action="{{ route ('client.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" 
                placeholder="Nombre Del Estudiante" value="{{old('name') ?? @$client->name}}">
                <p class="form-text">Escriba el nombre del estudiante</p>
                @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" 
                placeholder="" value="{{old('correo') ?? @$client->correo}}">
                <p class="form-text">Escriba su correo</p>
                @error('correo')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Programa académico</label>
                <input type="text" name="programa" class="form-control" 
                placeholder="Programa Estudiante" value="{{old('programa') ?? @$client->programa}}">
                <p class="form-text">Escriba programa académico</p>
                @error('programa')
                <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            
            @if(isset($client))
                <button type="submit">Editar Cliente</button>
            @else
                <button type="submit">Guardar Cliente</button>
            @endif            
        </form> 
            
    </div>
@endsection