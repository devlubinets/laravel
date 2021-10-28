<a href="{{ route('products.show', [$random->id, $random->slug ]) }}">
<div class="card card-carousel">
    @if($random->image === null)
        <img width="599px" height="445px" src="{{ asset('images/empty.png') }}" alt="empty">
    @else
        <img width="599px" height="445px" src="{{ \Illuminate\Support\Facades\Storage::url('products/' . $random->id . '/' . $random->image) }}" class="card-img-top" alt="{{ $random->code }}">
    @endif
    <div class="card-body card-body-style">
        <h5 class="card-title">{{ $random->name }}</h5>
        <p class="card-text">{{ $random->price }} грн.</p>
        <p>{{ $random->category ? $random->category->name : 'category' }}</p>
    </div>
</div>
</a>
