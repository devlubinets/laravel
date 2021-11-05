@extends('layouts.app')

@section('title-block', 'Главная')

@section('content')
    <div class="container-fluid">
        <h2>Лучшие предложение:</h2>
        <div class="slider-nav">
            @foreach($randoms as $random)
                @include('user.parts.product.product-carousel', $random)
            @endforeach
        </div>
    </div>

    <div class="show-all-product">
        <h1>Перейдите к главному</h1>
        <a href="{{route('products.index')}}" style="text-decoration: none">
            <button type="button" class="btn btn-success" style="margin-top: 58px;padding: 2%;font-size: 24px; " >Показать все товары</button>
        </a>
    </div>

    <div class="doggy-black-show" style="margin-left: 200px;">
        <div class="content-home-show">
            @auth()
                <h1>Рад тебя видеть: {{ auth()->user()->name }}</h1>
                <h5>В мире стало на одну собаку веселее</h5>
            @else
                <h1>Стань своим</h1>
                <h5>Зарегистрируйся на сайте и получи массу преимуществ</h5>
                <a href="{{route('register')}}">
                    <button type="button" class="btn btn-dark btn-main">Зарегистрироваться</button>
                </a>
            @endauth
        </div>
    </div>
@endsection
