
<div class="col-3 mb-3 product-card-show">
    <div class="card" >
        @if($product->image === null)
            <img width="310px" height="230px" src="{{ asset('images/empty.png') }}" alt="empty">
        @else
            <img src="{{ \Illuminate\Support\Facades\Storage::url('products/' . $product->id . '/' . 'medium_' . $product->image) }}" class="card-img-top" alt="{{ $product->code }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->price }} грн.</p>
            {{ $product->category ? $product->category->name : '' }}
        </div>
        <form action="{{ route('user.basket-add', $product) }}" method="POST">
            <div class="contain-main-link">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                <a href="{{ route('product.show', [$product->code, $product ]) }}" class="btn  btn-secondary">Подробнее</a>
                @csrf
            </div>
        </form>
    </div>
</div>

