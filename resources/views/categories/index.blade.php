@extends('layouts.app')

@section('content')
    <p>Categorias de libros</p>

    <a href="{{ route('category.create') }}">Nueva categoría</a>

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
                            <a href="{{ route('category.edit', $category) }}">Editar</a>
                            <a href="javascript:void(0);" onclick="isRelatedToBook({{$category->id}})">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
    @endempty
@endsection

@section('pageScripts')
    <script>
        function isRelatedToBook(id)
        {
            var id = id
            var sure = confirm('¿Está seguro de eliminar la categoría?')
            if (!sure) {
                return false
            }
            fetch("{{ route('category.isRelated') }}/"+id)
            .then((response) => {
                if (response) {
                    var msg = 'La categoría esta relacionada con uno o varios libros.\n'
                    msg += '¿Aún desea eliminarla?, Al hacerlo se quitara esta categoria de los libros relacionados.'
                    return confirm(msg)
                }
                return true;
            })
            .then((deleteCategory) => {
                if (deleteCategory) {
                    var options = {
                        method: 'DELETE',
                        headers: {'content-type': 'application/json'},
                        body: JSON.stringify({_token: "{{ csrf_token() }}" })
                    }
                    fetch("{{ route('category.delete') }}/" + id, options)
                    .then((responseMessage) => {
                        responseMessage.text().then((text) => alert(text) )
                    })
                }
            })
        }
    </script>
@endsection