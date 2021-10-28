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
                    <div class="card" >
                        @if($post->image === null)
                            <img width="310px" height="230px" src="{{ asset('images/empty.png') }}" alt="empty">
                        @else
                            <img src="{{ \Illuminate\Support\Facades\Storage::url('products/' . $post->id . '/' . 'medium_' . $post->image) }}" class="card-img-top" alt="{{ $post->code }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->name }}</h5>
                            <p class="card-text">{{ $post->price }} грн.</p>
                            <p class="card-text">{{ substr($post->description, 0, 45). "..."}}</p>
                        </div>
                        <form action="{{ route('basket.add', $post) }}" method="POST">
                            <div class="contain-main-link">
                                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                                <a href="{{ route('products.show', [$post->id, $post->slug]) }}" class="btn  btn-secondary">Подробнее</a>
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
                </div>
    @else
        <div class="text-center">
            <h2>No posts found</h2>
        </div>
    @endif
@endsection
