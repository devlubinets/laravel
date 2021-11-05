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
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Имя:</span>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               aria-label="Username" aria-describedby="basic-addon1"
                               value="{{ auth()->user()->name ?? ''}}">

                        @error('name')
                        <label id="validation-name-error"
                               class="error jquery-validation-error small form-text invalid-feedback"
                               for="validation-name">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Почта:</span>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               aria-label="Username" aria-describedby="basic-addon2"
                               value="{{ auth()->user()->email ?? ''}}">
                        @error('email')
                        <label id="validation-email-error"
                               class="error jquery-validation-error small form-text invalid-feedback"
                               for="validation-email">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">Номер телефона:</span>
                        <input type="text" id="phone_uk" name="phone"
                               class="form-control phone_uk @error('phone') is-invalid @enderror" aria-label="Username"
                               placeholder="0(XX)XX-XXX-XX" aria-describedby="basic-addon3">

                        @error('phone')
                        <label id="validation-phone-error"
                               class="error jquery-validation-error small form-text invalid-feedback"
                               for="validation-phone">{{ $message }}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Подтвердить заказ</button>
                </form>
            </div>
        </div>
    </div>
@endsection

