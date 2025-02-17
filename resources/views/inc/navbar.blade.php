<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Почетна</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ url('category') }}">
                        <i class="fa-solid fa-cookie"></i>
                        Производи
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ url('aboutus') }}">
                        <i class="fa-regular fa-address-card"></i>
                        O нама
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ url('contact') }}">
                        <i class="fa-solid fa-square-phone"></i>
                        Контактирајте нас
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{ url('impressions') }}">
                        <i class="fa-solid fa-comments"></i>
                        Утисци
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
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">Одјавите
                            се</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
                @if (Auth::user()->role_as == '0')
                    <div>
                        <ul class="navbar-nav">
                            <a class="nav-link" href="{{ url('cart') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="badge badge-pill bg-danger cart-count">0</span>
                            </a>
                            <li class="nav-item">
                                <a class="nav-link position-relative" href="{{ url('wishlist') }}">
                                    <i class="fa-solid fa-heart"></i>
                                    <span class="badge badge-pill bg-danger wishlist-count">0</span>
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
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">Одјавите
                                    се</a>

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