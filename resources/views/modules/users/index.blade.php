@extends('layouts/main')

@section('contenido')
    <div class="container mt-4">
        <h2 class="text-center">CRUD con Laravel 11</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('create') }}" class="btn btn-primary">Agregar</a>
                        <hr>

                        <table class="table tabla-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <form action="{{ route('destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('show', $item->id) }}" class="btn btn-info">Mostrar</a>
                                                <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Editar</a>
                                                <button class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No hay datos en la tabla...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
