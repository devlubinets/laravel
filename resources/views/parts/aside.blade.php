
<div class="col-2">
    <div class="flex-shrink-0 p-3 bg-white" >
        <div class="ps-3">
            <h5>Фильтры</h5>
        </div>
        <hr>
        <div class="mb-2">
            <a class="btn btn-outline-info align-items-center rounded " href="{{ route('products.index') }}">
                Все товары
            </a>
        </div>
        <ul class="list-unstyled ps-0 mb-2">
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    Категории
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        @foreach($categories as $category)
                            <li><a href="{{ route('products.index', $category->id) }}" class="link-dark rounded">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <form method="GET" action="{{ route('products.index') }}">
                <div class="filters">
                    <div class="col-md-12 mb-3" style="padding: 0">
                        <label for="price_from">Цена от
                            <input type="text"
                                   class="form-control form-control-sm @error('price_from') is-invalid @enderror"
                                   name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                            @error('price_from')
                            <label id="validation-price_from-error"
                                   class="error jquery-validation-error small form-text invalid-feedback"
                                   for="validation-price_from">{{ $message }}</label>
                            @enderror
                        </label>
                        <label for="price_to">до
                            <input type="text"
                                   class="form-control form-control-sm @error('price_to') is-invalid @enderror"
                                   name="price_to" id="price_to" size="6" value="{{ request()->price_to }}">
                            @error('price_to')
                            <label id="validation-price_to-error"
                                   class="error jquery-validation-error small form-text invalid-feedback"
                                   for="validation-price_to">{{ $message }}</label>
                            @enderror
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-12 ">
                        <label for="hit">
                            <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> Хит
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-12 ">
                        <label for="new">
                            <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> Новинка
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-12 mb-3">
                        <label for="recommend">
                            <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> Рекомендуем
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-3">
                        <button type="submit" class="btn btn-primary">Фильтр</button>
                    </div>
                </div>
            </form>
        </ul>
    </div>

</div>

