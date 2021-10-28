<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="d-flex align-items-center col-3 ms-2 mb-2 mb-md-0 text-dark text-decoration-none">
        <a href="/">
            <img src="{{ asset('/images/shop.png') }}" width="40px" height="40px" alt="hero">
        </a>
    </div>

    <form action="{{ route('search') }} " class="nav col-12 col-md-5 mb-2 justify-content-center  mb-md-0" method="GET">
        <input type="text" class="form-control form-control-width" placeholder="Поиск товара..." name="search" required/>
        <button type="submit" class="btn btn-secondary">Поиск</button>
    </form>

    <div class="nav col-2 mb-2 justify-content-end ms-3 mb-md-0">
        @auth()
            <div class="flex-shrink-0 dropdown">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle user-link" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                   {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-111px, 34px);" data-popper-placement="bottom-end">
                    <li><a class="dropdown-item" href="{{ route('basket.show') }}">Корзина</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> Выйти
                        </a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
            <div>
                <a href="{{route('login')}}" style="text-decoration: none">
                    <button type="button" class="btn btn-light text-dark me-2" >Войти</button>
                </a>
                <a href="{{route('register')}}">
                    <button type="button" class="btn btn-dark btn-main">Зарегистрироваться</button>
                </a>
            </div>
        @endauth
    </div>
</header>
