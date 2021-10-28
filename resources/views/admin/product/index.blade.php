@extends('layouts.app-admin')

@section('title-block', 'Товары')

@section('content')
    <div class="header">
        <h1 class="header-title">
            Товары
        </h1>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-actions float-right">
                        <a href="{{ route('admin.products.create') }}">
                            <button class="btn btn-primary mr-2">Создать</button>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="mr-1">
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
                    <h5 class="card-title mb-0">Список товаров:</h5>
                </div>
                <div class="card-body">
                    <div id="datatables-clients_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="datatables-clients" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" role="grid">
                            <thead>
                            <tr role="row">
                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 100px;">
                                    #
                                </th>
                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 100px;">
                                    Код
                                </th>
                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 100px;">
                                    Имя
                                </th>
                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 475px;">
                                    Описание
                                </th>
                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 56px;">
                                    Цена
                                </th>
                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 104px;">
                                    Действие
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                    <tr role="row" class="odd">
                                        <td>
                                            {{ $product->id }}
                                            @if($product->image === null)
                                                <img height="56px" width="75px" src="{{ asset('images/empty.png') }}" alt="empty">
                                            @else
                                                <img  src="{{ \Illuminate\Support\Facades\Storage::url('products/' . $product->id . '/' . 'small_' . $product->image) }}" alt="{{ $product->code }}">
                                            @endif
                                        </td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $product) }}" class="text-primary">
                                                <i class="align-middle mr-2 fas fa-fw fa-eye"></i></a>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-success"><i class="align-middle mr-2 fas fa-fw fa-edit"></i></a>

                                            <a href="{{ route('admin.products.destroy', $product) }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-product{{ $product->id }}').submit();">
                                                <i class="align-middle mr-2 fas fa-fw fa-trash"></i>
                                            </a>
                                            <form id="delete-product{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
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
@endsection
