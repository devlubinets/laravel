@extends('layouts.app')

@section('title-block', 'Корзина')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/layouts/basket.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/layouts/basket.js') }}" defer></script>
@endpush

@section('content')
<div class="starter-template">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Все товары</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина</li>
        </ol>
    </nav>
    @if($order->products->count() > 0)
        <h1>Корзина</h1>
        <p>Оформление заказа</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>
                        <span style="padding-left: 7% ">Кол-во</span>
                    </th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr class="js-products-item" data-id="{{ $product->id }}" data-count="{{ $product->pivot->count }}">
                        <td>
                            <a href="{{ route('products.show', [$product->id, $product->slug]) }}">
                                <img width="64px" class="img-fluid" src="{{ $product->getImage('small_') }}" alt="{{ $product->code }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>
                            <span class="badge js-count-badge">{{ $product->pivot->count }}</span>
                            <div class="btn-group form-inline btn-group-padding">
                                <form action="{{ route('basket.remove', $product->id )}}" class="js-ajax-basket" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" href="">
                                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    </button>
                                </form>
                                <form action="{{ route('basket.add', $product->id )}}" class="js-ajax-basket" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success" role="button" >
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }} ₴</td>
                        <td>{{ $product->getPriceForCount() }} ₴</td>
                    </tr>
                @endforeach
                <tr class="js-full-price">
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{ $order->getFullPrice() }} ₴</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{ route('basket.place') }}">Оформить заказ</a>
            </div>
        </div>
    @else
        <div class="text-center">
            <h2>Ваша корзина пустая!</h2>
            <p>
                <a href="{{ route('products.index') }}">Добавьте товар в корзину</a>
            </p>
        </div>
    @endif
</div>
@endsection
