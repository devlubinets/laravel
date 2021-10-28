@extends('layouts.app')

@section('title-block', 'Корзина')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/layouts/basket.css') }}">
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
                    <tr>
                        <td>
                            <a href="{{ route('products.show', [$product->id, $product->slug]) }}">
                                @if($product->image === null)
                                    <img height="56px" width="75px" src="{{ asset('images/empty.png') }}" alt="empty">
                                @else
                                    <img  src="{{ \Illuminate\Support\Facades\Storage::url('products/' . $product->id . '/' . 'small_' . $product->image) }}" alt="{{ $product->code }}">
                                @endif
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>
                            <span class="badge">{{ $product->pivot->count }}</span>
                            <div class="btn-group form-inline btn-group-padding">
                                <form action="{{ route('basket.remove', $product->id )}}" method="POST">
                                    <button type="submit" class="btn btn-danger" href="">
                                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    </button>
                                    @csrf
                                </form>
                                <form action="{{ route('basket.add', $product->id )}}" method="POST">
                                    <button type="submit" class="btn btn-success" role="button" >
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }} ₴</td>
                        <td>{{ $product->getPriceForCount() }} ₴</td>
                    </tr>
                @endforeach
                <tr>
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
