@extends('layouts.app')

@section('content')
    <p>Categorias de libros</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @empty($categories)
        <p>No hay categorias registradas</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            acciones
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
    @endempty
@endsection