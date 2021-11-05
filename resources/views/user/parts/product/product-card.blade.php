
<div class="col-3 mb-3 product-card-show">
    <div class="card" >
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">Новинка</span>
            @endif
            @if($product->isRecommend())
                    <span class="badge badge-warning">Рекомендуемое</span>
            @endif
            @if($product->isHit())
                    <span class="badge badge-danger">Хит продаж</span>
            @endif
        </div>
        <img width="312px" height="206px"  src="{{ $product->getImage('medium_') }}" alt="{{ $product->code }}">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->price }} грн.</p>
            {{ $product->category ? $product->category->name : '' }}
        </div>
        <form action="{{ route('basket.add', $product) }}" method="POST">
            @csrf
            <div class="contain-main-link">
                @if($product->isAvailable())
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                @else
                    <button class="btn btn-outline-dark" disabled>Не доступно</button>
                @endif
                <a href="{{ route('products.show', [$product->id, $product->slug ]) }}" class="btn  btn-secondary">Подробнее</a>
            </div>
        </form>
    </div>
</div>

