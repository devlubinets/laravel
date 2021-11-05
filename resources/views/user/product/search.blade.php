@extends('layouts.app')
@section('title-block', 'Результаты поиска')

@section('content')
    @if($posts->isNotEmpty())
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Все товары</a></li>
                <li class="breadcrumb-item active" aria-current="page">Результаты поиска</li>
            </ol>
        </nav>
        <h1 class="text-center">Вывод товаров:</h1>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-3 mb-3 product-card-show">
                    <div class="card">
                        <img class="img-fluid" src="{{ $post->getImage() }}" alt="{{ $post->code }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->name }}</h5>
                            <p class="card-text">{{ $post->price }} грн.</p>
                            <p class="card-text">{{ substr($post->description, 0, 45). "..."}}</p>
                        </div>
                        <form action="{{ route('basket.add', $post) }}" method="POST">
                            @csrf
                            <div class="contain-main-link">
                                @if($post->isAvailable())
                                    <button type="submit" class="btn btn-outline-secondary" role="button">Добавить в корзину</button>
                                @else
                                    <button class="btn btn-outline-dark" disabled>Не доступно</button>
                                @endif
                                <a href="{{ route('products.show', [$post->id, $post->slug]) }}"
                                   class="btn  btn-secondary">Подробнее</a>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    @else
        <div class="text-center">
            <h2>Запрос не найден</h2>
        </div>
    @endif
@endsection
