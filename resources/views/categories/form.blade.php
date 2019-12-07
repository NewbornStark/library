@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <input name="id" type="hidden" value="{{ old('id', $category->id) }}">
        <label for="name">Nombre</label>
        <input id="name" name="name" type="text" maxlength="255"
            value="{{ old('name', $category->name) }}">
        <br>
        <input type="submit" value="Guardar">
    </form>
@endsection