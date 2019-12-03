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

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name">Nombre</label>
        <input id="name" name="name" type="text" maxlength="255" 
            value="{{ old('name') }}">
        <br>
        <label for="email">Correo</label>
        <input id="email" name="email" type="email" maxlength="255"
            value="{{ old('email') }}">
        <br>
        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" maxlength="255">
        <br>
        <input type="submit" value="Guardar">
    </form>
@endsection