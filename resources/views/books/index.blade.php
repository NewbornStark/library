@extends('layouts.app')

@section('content')
    <p>libros</p>

    @empty($books)
        <p>No hay libros registrados</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Fecha de publicación</th>
                </tr>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->published }}</td>
                    </tr>
                @endforeach
            </thead>
        </table>
        <br>
        {{ $books->links() }}
    @endempty
@endsection