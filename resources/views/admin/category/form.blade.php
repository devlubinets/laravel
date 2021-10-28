@extends('layouts.app-admin')

@isset($category)
    @section('title-block', 'Редактирование Категории' . $category->name)
@else
    @section('title-block', 'Создание Категории')
@endisset

@section('content')
    <div class="header">
        <h1 class="header-title">
            Категории
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Категории</a></li>
                <li class="breadcrumb-item active" aria-current="page">@isset($category)Редактирование @else Создание @endisset</li>
            </ol>
        </nav>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                @isset($category)
                    <h5 class="card-title">Редактируйте <b>{{ $category->name }}</b></h5>
                @else
                    <h5 class="card-title">Создайте категории</h5>
                @endisset
            </div>
            <div class="card-body">
                <form method="POST"
                    @isset($category)
                        action="{{route('admin.categories.update', $category)}}"
                    @else
                        action="{{route('admin.categories.store')}}"
                    @endisset
                >
                    <div class="form-group row">
                        @isset($category)
                            @method('PUT')
                        @endisset
                        <label class="col-form-label col-sm-2 text-sm-right">Название категории:</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($category) ? $category->name : null) }}">

                            @error('name')
                                <label id="validation-name-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Описание:</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">@isset($category){{ $category->description }}@endisset</textarea>

                            @error('description')
                            <label id="validation-description-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-description">{{ $message }}</label>
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
