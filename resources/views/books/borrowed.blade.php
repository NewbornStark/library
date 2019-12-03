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
                    <th>Descripción</th>
                    <th>Fecha de publicación</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->published }}</td>
                        <td>
                            <a href="javascript:void(0);" onclick="
                                document.querySelector('#frmLendBook{{$book->id}}').submit()
                            ">Prestar</a>
                            <form id="frmLendBook{{$book->id}}" style="display:none;"
                                action="{{ route('book.lend', $book->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="return_date"
                                    value="2020-01-01 12:00:00">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
        <br>
        {{-- {{ $books->links() }} --}}
    @endempty
@endsection