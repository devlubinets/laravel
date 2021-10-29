@extends('layouts.app-admin')

@section('title-block', 'Создание товара')

@section('content')
    <div class="header">
        <h1 class="header-title">
            Товары
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Товары</a></li>
                <li class="breadcrumb-item active" aria-current="page">Создание</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Создайте товар</h5>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin.products.store')}}">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Код товара:</label>
                        <div class="col-sm-10">
                            <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code'}}">

                            @error('code')
                                <label id="validation-code-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-code">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Название:</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name'}}">

                            @error('name')
                                <label id="validation-name-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 ">
                        <label class="col-form-label col-sm-2 text-sm-right">Категория:</label>
                        <select name="category_id" class="custom-select col-sm-10">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Описание:</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>

                            @error('description')
                            <label id="validation-description-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-description">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Картинка:</label>
                        <div class="col-sm-10">
                            <input type="file" class="@error('image') is-invalid @enderror" name="image">
                            @error('image')
                            <label id="validation-image-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Цена:</label>
                        <div class="col-sm-10">
                            <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">

                            @error('price')
                            <label id="validation-price-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-price">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            @csrf
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
