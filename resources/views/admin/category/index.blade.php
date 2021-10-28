@extends('layouts.app-admin')

@section('title-block', 'Категории')

@section('content')
    <div class="header">
        <h1 class="header-title">
            Категории
        </h1>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <a href="{{ route('admin.categories.create') }}">
                                <button class="btn btn-primary mr-2">Создать</button>
                            </a>
                            <a href="{{ route('admin.categories.index') }}" class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw align-middle">
                                    <polyline points="23 4 23 10 17 10"></polyline>
                                    <polyline points="1 20 1 14 7 14"></polyline>
                                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                </svg>
                            </a>
                            <div class="d-inline-block dropdown show">
                                <a href="#" data-toggle="dropdown" data-display="static">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical align-middle">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mb-0">Список категорий:</h5>
                    </div>
                    <div class="card-body">
                        <div id="datatables-clients_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatables-clients" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 56px;">
                                                    #
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 175px;">
                                                    Имя
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 104px;">
                                                    Действие
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr role="row" class="odd">
                                                <td> {{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                        <a href="{{ route('admin.categories.show', $category) }}" class="show-icons"><i class="align-middle mr-2 fas fa-fw fa-eye"></i></a>
                                                        <a href="{{ route('admin.categories.edit', $category) }}" class="edit-success-icons"><i class="align-middle mr-2 fas fa-fw fa-edit"></i></a>

                                                        <a href="{{ route('admin.categories.destroy', $category) }}" class="delete-icons" onclick="event.preventDefault(); document.getElementById('delete-category{{ $category->id }}').submit();">
                                                            <i class="align-middle mr-2 fas fa-fw fa-trash"></i>
                                                        </a>
                                                        <form id="delete-category{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--<a href="{{ route('admin.categories.destroy', $category->id) }}" class="delete-icons" onclick="event.preventDefault(); document.getElementById('delete-category').submit();">--}}
{{--    <i class="align-middle mr-2 fas fa-fw fa-trash"></i>--}}
{{--</a>--}}
{{--<form id="delete-category" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">--}}
{{--    @csrf--}}
{{--    @method('DELETE')--}}
{{--</form>--}}

{{--<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">--}}
{{--    <a href="{{ route('admin.categories.show', $category) }}" class="show-icons"><i class="align-middle mr-2 fas fa-fw fa-eye"></i></a>--}}
{{--    <a href="{{ route('admin.categories.edit', $category) }}" class="done-icons"><i class="align-middle mr-2 fas fa-fw fa-edit"></i></a>--}}

{{--    <i class="align-middle mr-2 fas fa-fw fa-trash delete-icons"></i>--}}
{{--    <input type="submit" >--}}
{{--    @csrf--}}
{{--    @method('DELETE')--}}
{{--</form>--}}
