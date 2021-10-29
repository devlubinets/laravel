@extends('layouts.app-admin')

@section('title-block', 'Заказ' . $order->id)

@section('content')
    <div class="header">
        <h1 class="header-title">Заказ № {{ $order->id }}</h1>
        <h4 class="text-white">Заказчик: <b>{{ $order->name }}</b></h4>
        <h4 class="text-white">Номер телефона: <b>{{ $order->phone }}</b></h4>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-actions float-right">
                    <a href="{{ route('admin.orders.index') }}" class="mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle">
                            <polyline points="23 4 23 10 17 10"></polyline>
                            <polyline points="1 20 1 14 7 14"></polyline>
                            <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                        </svg>
                    </a>
                    <div class="d-inline-block dropdown show">
                        <a href="#" data-toggle="dropdown" data-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="12" cy="5" r="1"></circle>
                                <circle cx="12" cy="19" r="1"></circle>
                            </svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <h5 class="card-title mb-0">Список товаров:</h5>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width:40%;">Название</th>
                    <th style="width:25%">Кол-во</th>
                    <th class="d-none d-md-table-cell" style="width:25%">Цена</th>
                    <th style="width:25%">Стоимость</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('admin.products.show', $product->id) }}">
                                    <img width="64" class="img-fluid" src="{{ $product->getImage('small') }}" alt="{{ $product->code }}">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td><span class="badge badge-primary">{{ $product->pivot->count }}</span></td>
                            <td class="d-none d-md-table-cell">{{ $product->price }}</td>
                            <td>{{ $product->getPriceForCount() }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Общая стоимость:</td>
                        <td>{{ $order->getFullPrice() }} ₴</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
