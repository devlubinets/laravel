@extends('layouts.app')

@section('title-block', $product->name)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Все товары</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name  }}</li>
        </ol>
    </nav>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <img width="600px" class="img-fluid" src="{{ $product->getImage('medium_') }}" alt="{{ $product->code }}">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">{{ $product->name }}</h1>
            <p class="lead fw-normal">{{ $product->price }} гривен</p>
            <form action="{{ route('basket.add', $product) }}" class="mb-3" method="POST">
                @csrf
                @if($product->isAvailable())
                    <button type="submit" class="btn btn-outline-success" role="button">Добавить в корзину</button>
                @else
                    <button class="btn btn-outline-dark" disabled>Не доступно</button>
                @endif
            </form>
            <p class="lead fw-normal">{{ $product->description }}</p>
        </div>
    </div>
@endsection

