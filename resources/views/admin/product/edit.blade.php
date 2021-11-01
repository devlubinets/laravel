@extends('layouts.app-admin')

@section('title-block', 'Редактирование товара' . $product->name)

@section('content')
    <div class="header">
        <h1 class="header-title">
            Товары
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Товары</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редактирование</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Редактируйте <b>{{ $product->name }}</b></h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.products.update', $product)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Код товара:</label>
                        <div class="col-sm-10">
                            <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', isset($product) ? $product->code : null) }}">

                            @error('code')
                            <label id="validation-code-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-code">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Название:</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($product) ? $product->name : null) }}">

                            @error('name')
                            <label id="validation-name-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 ">
                        <label class="col-form-label col-sm-2 text-sm-right">Категория:</label>
                        {{--                        <input type="text" class="form-control" placeholder="Search for...">--}}
                        <select name="category_id" class="custom-select col-sm-10">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                        @if($product->categoty_id == $category->id)
                                        selected
                                    @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {{--                        <span class="input-group-append">--}}
                        {{--											<button class="btn btn-secondary" type="button">Go!</button>--}}
                        {{--                        </span>--}}
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Описание:</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', isset($product) ? $product->description : null) }}</textarea>

                            @error('description')
                            <label id="validation-description-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-description">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Картинка:</label>
                        <div class="col-sm-10">
                            <input type="file" class="@error('image') is-invalid @enderror" value="{{ old('image', isset($product) ? $product->image : null) }}" name="image">
                            @error('image')
                            <label id="validation-image-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Цена:</label>
                        <div class="col-sm-10">
                            <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', isset($product) ? $product->price : null) }}">

                            @error('price')
                            <label id="validation-price-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-price">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        @foreach([
                            'hit' => 'Хит продаж',
                            'new' => 'Новинка',
                            'recommend' => 'Рекомендуемое',
                            ] as $field => $title)
                            <label class="col-form-label col-sm-2 text-sm-right"></label>
                            <div class="col-sm-10">
                                <label class="form-check">
                                    <input class="form-check-input " type="checkbox" name="{{ $field }}"
                                           id="{{ $field }}"
                                           @if($product->$field === 1)
                                                checked="checked"
                                           @endif
                                    <span class="form-check-label">
                                        {{ $title }}
                                    </span>
{{--                                    @error('price')--}}
{{--                                    <label id="validation-price-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-price">{{ $message }}</label>--}}
{{--                                    @enderror--}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

