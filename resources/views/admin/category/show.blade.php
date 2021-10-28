@extends('layouts.app-admin')

@section('title-block', $category->name)

@section('content')
    <div class="header">
        <h1 class="header-title">
            Категория
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ $category->name }}</h5>
                <p>ID: {{ $category->id }}</p>
            </div>
            <div class="card-body">
                <p class="card-text">Описание: {{ $category->description }}</p>
            </div>
            <div class="card-body">
                <p class="card-text">Кол-во товаров: {{ $category->products->count() }}</p>
            </div>
        </div>
    </div>
@endsection
