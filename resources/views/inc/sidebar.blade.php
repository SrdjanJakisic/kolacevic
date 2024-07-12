<div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo"><a href="#" class="simple-text logo-normal">
            Колачевић
        </a>
    </div>

    @if (Auth::user()->role_as == '2')
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item {{ Request::is('products') ? 'active' : '' }} ">
                    <a class="nav-link" href="{{ url('products') }}">
                        <i class="material-icons">list</i>
                        <p>Производи</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('add-products') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('add-products') }}">
                        <i class="material-icons">add</i>
                        Додај производ
                    </a>
                </li>
                <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('orders') }}">
                        <i class="material-icons">list</i>
                        Поруџбине
                    </a>
                </li>
                <li class="nav-item {{ Request::is('carousel') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('carousel') }}">
                        <i class="material-icons">list</i>
                        Слајдери
                    </a>
                </li>
                <li class="nav-item {{ Request::is('messages') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('messages') }}">
                        <i class="material-icons">list</i>
                        Поруке
                    </a>
                </li>
            </ul>
        </div>
    @endif

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">house</i>
                    Почетна
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">list</i>
                    Категорије
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-category') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-category') }}">
                    <i class="material-icons">add</i>
                    Додај категорију
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ url('products') }}">
                    <i class="material-icons">list</i>
                    <p>Производи</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-products') }}">
                    <i class="material-icons">add</i>
                    Додај производ
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">list</i>
                    Поруџбине
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}">
                    <i class="material-icons">persons</i>
                    Корисници
                </a>
            </li>
            <li class="nav-item {{ Request::is('carousel') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('carousel') }}">
                    <i class="material-icons">list</i>
                    Слајдери
                </a>
            </li>
            <li class="nav-item {{ Request::is('messages') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('messages') }}">
                    <i class="material-icons">list</i>
                    Поруке
                </a>
            </li>
        </ul>
    </div>
</div>