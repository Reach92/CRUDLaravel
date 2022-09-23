@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de estudiantes</h1>
        <a href= "{{ route ('client.create') }}" class="btn btn-primary">Crear Estudiante</a>
        @if(Session::has('mensaje'))
        <div class='alert alert-info my-5'>
            {{Session::get('mensaje')}}
        </div>
        @endif
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Correo</th>             
                <th>Programa académico</th>
                <th>Acción</th>
            </thead>
            <tbody>
                @forelse ($clients as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->correo}}</td>
                        <td>{{$detail->programa}}</td>
                        <td><a href="{{ route ('client.edit',$detail) }}" 
                        class="btn btn-warning">Editar</a><form action="{{ route ('client.destroy', $detail) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm ('¿Seguro que desea eliminar el cliente?')">Eliminar</button>
                        </form></td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">No hay registros</td>
                </tr>
                @endforelse    
            </tbody>
        </table>
        @if ($clients->count())
            {{$clients->links()}}
        @endif
    </div>
@endsection