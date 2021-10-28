
<nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center"></i>
    </a>

    <form class="form-inline d-none d-sm-inline-block">
        <input class="form-control form-control-lite" type="text" placeholder="Search projects...">
    </form>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown ml-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
                    <i class="align-middle fas fa-cog">
                    </i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-user"></i> Посмотреть профиль</a>
                    <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-cogs"></i> Настройки</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();">
                        <i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> Выйти
                    </a>
                </div>
            </li>
        </ul>
        <form id="logout-form-admin" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</nav>
<!--<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="/" class="nav-link " target="_blank" aria-current="page">Просмотр сайта</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"> Товары </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"> Категории </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"> Заказы </a>
            </li>
        </ul>
    </header>
</div>-->
