<!-- Right Side Of Navbar -->
<ul>
    <!-- Authentication Links -->
    @guest
        <li>
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li>
            <a href="{{ route('books') }}">Biblioteca</a>
        </li>
        <li>
            <a href="{{ route('book.create') }}">Registrar libro</a>
        </li>
        <li>
            <a href="{{ route('borrowed.books') }}">Libros prestados</a>
        </li>
        <li>
            <a href="{{ route('categories') }}">Categorías</a>
        </li>
        <li>
            <a href="{{ route('category.create') }}">Registrar categorías</a>
        </li>
        <li>
            <a href="{{ route('users') }}">Lectores</a>
        </li>
        <li>
            <a href="{{ route('user.create') }}">Registrar lectores</a>
        </li>
        <li>
            <div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>