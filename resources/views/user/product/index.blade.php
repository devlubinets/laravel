@extends('layouts.app')
@section('title-block', 'Главная')

@section('content')
    <div class="row">
        @include('parts.aside')
        <div class="col-9">
            <div class="starter-template">
                <div style="text-align: center">
                    @if($category )
                        <h1>Категория: {{ $category->name }}</h1>
                    @else
                        <h1>Товары</h1>
                    @endif
                    <h2>Количество товаров: {{ $count }}</h2>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        @include('user.parts.product.product-card', $product)
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12">
            <div>
                <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="{{ asset('images/up-arrow.png') }}" width="50px" height="50px" alt="up"></button>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
