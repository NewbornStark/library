@extends('layouts.app')

@section('content')
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <label for="author">Author</label>
        <input id="author" name="author" type="text" maxlength="255" 
            value="{{ old('author') }}">
        <br>
        <label for="title">Titulo</label>
        <input id="title" name="title" type="text" maxlength="255"
            value="{{ old('title') }}">
        <br>
        <label for="description">Descripción</label>
        <textarea name="description" id="description" maxlength="500"
            cols="30" rows="10">{{ old('description') }}</textarea>
        <br>
        <label for="published">Publicación</label>
        <input id="published" name="published" type="date">
        <br>
        <input type="submit" value="Guardar">
    </form>
@endsection