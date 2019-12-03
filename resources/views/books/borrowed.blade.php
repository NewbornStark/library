@extends('layouts.app')

@section('content')
    <p>libros prestados</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @empty($books)
        <p>No hay libros registrados</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Titulo</th>
                    <th>Prestado a</th>
                    <th>Fecha de prestamo</th>
                    <th>Fecha de devolución</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->name }} <br> {{ $book->email }}</td>
                        <td>{{ $book->loan_date }}</td>
                        <td>{{ $book->return_date }}</td>
                        <td>
                            acciones
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
        <br>
        {{-- {{ $books->links() }} --}}
    @endempty
@endsection