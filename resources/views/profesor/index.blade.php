@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de profesores</h1>
        <a href= "{{ route ('profesor.create') }}" class="btn btn-primary">Crear Profesor</a>
        @if(Session::has('mensaje'))
        <div class='alert alert-info my-5'>
            {{Session::get('mensaje')}}
        </div>
        @endif
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Correo</th>             
                <th>Ocupación</th>
                <th>Acción</th>
            </thead>
            <tbody>
                @forelse ($profesores as $detail)
                    <tr>
                        <td>{{$detail->name}}</td>
                        <td>{{$detail->correo}}</td>
                        <td>{{$detail->ocupacion}}</td>
                        <td><a href="{{ route ('profesor.edit',$detail) }}" 
                        class="btn btn-warning">Editar</a><form action="{{ route ('profesor.destroy', $detail) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm ('¿Seguro que desea eliminar al profesor?')">Eliminar</button>
                        </form></td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">No hay registros</td>
                </tr>
                @endforelse    
            </tbody>
        </table>
        @if ($profesores->count())
            {{$profesores->links()}};
        @endif
    </div>
@endsection