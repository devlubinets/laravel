@extends('layouts.app')
@section('title-block', 'Корзина')
@section('content')
<div class="starter-template">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Все товары</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина</li>
        </ol>
    </nav>
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
{{--            @if($order->products)--}}
                    @foreach($order->products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('product.show', [$product->code]) }}">
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
                                    <form action="{{ route('user.basket-remove', $product->id )}}" method="POST">
                                        <button type="submit" class="btn btn-danger" href="">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </button>
                                        @csrf
                                    </form>
                                    <form action="{{ route('user.basket-add', $product->id )}}" method="POST">
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
                        <td colspan="3">Общая стоимость:</td>
                        <td>{{ $order->getFullPrice() }} ₴</td>
                    </tr>
{{--            @else--}}
{{--                <h1>Корзина пустая</h1>--}}
{{--            @endif--}}
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route('user.basket-place') }}">Оформить заказ</a>
        </div>
    </div>

</div>
@endsection
