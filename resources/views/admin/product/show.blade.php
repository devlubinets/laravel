@extends('layouts.app-admin')

@section('title-block', $product->name)

@section('content')
    <div class="header">
        <h1 class="header-title">
            Товар
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Товары</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ $product->name }}</h5>
                <div class="card-body">
                    <p>Картинка:</p>
                    <img class="img-fluid" src="{{ $product->getImage('medium_') }}" alt="{{ $product->code }}">
                </div>
                <p><u>ID:</u> {{ $product->id }}</p>
                <p><u>Code:</u> {{ $product->code }}</p>
            </div>
            <div class="card-body">
                <p class="card-text"><u>Описание:</u>   {{ $product->description }}</p>
                <p class="card-text"><u>Цена:</u> {{ $product->price}}</p>
                <p class="card-text"><u>Кол-во:</u> {{ $product->count}}</p>
                <p class="card-text"><u>Категория:</u> {{ $product->category ? $product->category->name : '' }}</p>
                <p class="card-text"><u>Лейблы:</u></p>
                <p class="card-text">
                    @if($product->isNew())
                        <span class="badge badge-success">Новинка</span>
                    @endif
                    @if($product->isRecommend())
                        <span class="badge badge-warning">Рекомендуемое</span>
                    @endif
                    @if($product->isHit())
                        <span class="badge badge-danger">Хит продаж</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
