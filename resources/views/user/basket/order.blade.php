@extends('layouts.app')

@section('title-block', 'Оформление заказа')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/layouts/basket.css') }}">
@endpush

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Все товары</a></li>
                <li class="breadcrumb-item"><a href="{{ route('basket.show') }}">Корзина</a></li>
                <li class="breadcrumb-item active" aria-current="page">Оформление заказа</li>
            </ol>
        </nav>
        <div class="order-flex-style">
            <h1>Подтвердите заказ:</h1>
            <p>Общая стоимость: <b>{{ $order->getFullPrice() }} ₴.</b></p>
            <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
            <div class="col-7">
                <form action="{{ route('basket.confirm') }}" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Имя:</span>
                        <input type="text" name="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value="{{ auth()->user()->name ?? ''}}">
                    </div>

{{--                    <div class="input-group mb-3">--}}
{{--                        <span class="input-group-text" id="basic-addon2">Почта:</span>--}}
{{--                        <input type="email" name="email" class="form-control" aria-label="Username" aria-describedby="basic-addon2" value="">--}}
{{--                    </div>--}}

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Номер телефона:</span>
                        <input type="text" name="phone" class="form-control" aria-label="Username" placeholder="+380(95)00-000-00" aria-describedby="basic-addon3">
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-success">Подтвердить заказ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
