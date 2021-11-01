<a href="{{ route('products.show', [$random->id, $random->slug ]) }}">
<div class="card card-carousel">
    @if($random->isNew())
        <span class="badge badge-success">Новинка</span>
    @endif
    @if($random->isRecommend())
        <span class="badge badge-warning">Рекомендуемое</span>
    @endif
    @if($random->isHit())
        <span class="badge badge-danger">Хит продаж</span>
    @endif
    <img width="442" height="303" src="{{ $random->getImage('medium_') }}" alt="{{ $random->code }}">
    <div class="card-body card-body-style">
        <h5 class="card-title">{{ $random->name }}</h5>
        <p class="card-text">{{ $random->price }} грн.</p>
        <p>{{ $random->category ? $random->category->name : 'category' }}</p>
    </div>
</div>
</a>
