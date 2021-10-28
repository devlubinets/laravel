<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="{{ route('products.index') }}" target="_blank">
        <img src="{{ asset('images/shop-white.png') }}" width="32px" height="32px" alt="Zoo">
        ZooShop
    </a>
    <div class="sidebar-content">
        <ul class="sidebar-nav">
            <li class="sidebar-item @routeactive('admin.orders.index') ">
                <a class="sidebar-link" href="{{ route('admin.orders.index') }}">Заказы
                    <span class="sidebar-badge badge badge-pill badge-primary">New</span>
                </a>
            </li>
            <li class="sidebar-item @routeactive('admin.client.index')">
                <a class="sidebar-link" href="{{ route('admin.client.index') }}">Клиенты</a>
            </li>
            <li class="sidebar-item @routeactive('admin.products.index')">
                <a class="sidebar-link" href="{{ route('admin.products.index') }}">Товары</a>
            </li>
            <li class="sidebar-item @if(\Illuminate\Support\Facades\Route::currentRouteNamed('admin.categories.index')) active @endif">
                <a class="sidebar-link" href="{{ route('admin.categories.index') }}">Категории</a>
            </li>

        </ul>
    </div>
</nav>
