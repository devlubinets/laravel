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
{{--                    @if($product->image === null)--}}
{{--                        <img height="230px" src="{{ asset('images/empty.png') }}" alt="empty">--}}
{{--                    @else--}}
{{--                        <img  src="{{ \Illuminate\Support\Facades\Storage::url('products/' . $product->id . '/' . 'medium_' . $product->image) }}" alt="{{ $product->code }}">--}}
{{--                        @endif--}}
                    </p>
                </div>
                <p>ID: {{ $product->id }}</p>
                <p>Code: {{ $product->code }}</p>
            </div>
            <div class="card-body">
                <p class="card-text">Описание:  {{ $product->description }}</p>
            </div>
            <div class="card-body">
                <p class="card-text">Цена: {{ $product->price}}</p>
            </div>
        </div>
    </div>
@endsection
