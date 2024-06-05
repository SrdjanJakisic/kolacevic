<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Почетна</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <div class="dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Чоколаде
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('organic') }}">Органске</a></li>
                        <li><a class="dropdown-item" href="{{ url('nonorganic') }}">Неорганске</a></li>
                    </ul>
                </div> --}}
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ url('category') }}">
                        <i class="fa-solid fa-cookie"></i>
                        Производи
                    </a>
                </li>
            </ul>

            @guest
            @if(Route::has('login'))
            <li class="nav-item">
                <a class="btn btn-outline-primary" href="{{ route('login') }}">Пријавите се</a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="btn btn-outline-primary" href="{{ route('register') }}">Региструјте се</a>
            </li>

            @endif
            @else
            @if ((Auth::user()->role_as == '1') || (Auth::user()->role_as == '2'))
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"> <i class="fa-solid fa-user"></i>
                    Добродошао {{ Auth::user()->firstName }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('dashboard') }}">Админ панел</a></li>
                </ul>
            </div>
            <li>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">Одјавите се</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @endif
            @if (Auth::user()->role_as == '0')
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('cart') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ url('wishlist') }}">
                            <i class="fa-regular fa-heart"></i>
                            Листа жеља
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"> <i class="fa-solid fa-user"></i>
                                Добродошао {{ Auth::user()->firstName }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('my-orders') }}">Поруџбине</a></li>
                                <li><a class="dropdown-item" href="{{ url('edit-user') }}">Измени податке</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Одјавите се</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>

            </div>
            @endif
            @endguest
        </div>
    </div>
</nav>