@extends('layouts.app-admin')

@section('title-block', 'Заказы')

@section('content')
    <div class="header">
        <h1 class="header-title">
            Заказы
        </h1>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">
                            <a href="{{ route('admin.orders') }}" class="mr-1">
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
                        <h5 class="card-title mb-0">Список заказов:</h5>
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
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 212px;">
                                                    Имя
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 175px;">
                                                    Телефон
                                                </th>
    {{--                                            <th tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 274px;">--}}
    {{--                                                Email--}}
    {{--                                            </th>--}}
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 104px;">
                                                    Сумма
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 150px;">
                                                    Дата отправление
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 104px;">
                                                    Действие
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr role="row" class="odd">
                                                    <td> {{ $order->id }}</td>
                                                    <td class="sorting_1">{{ $order->name }}</td>
                                                    <td>{{ $order->phone }}</td>
{{--                                                    <td>angelica@ramos.com</td>--}}
                                                    <td>{{ $order->getFullPrice() }} ₴</td>
                                                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                                                    <td>
                                                        <a href="#" class="show-icons"><i class="align-middle mr-2 fas fa-fw fa-eye"></i></a>
                                                        <a href="#" class="done-icons"><i class="align-middle mr-2 fas fa-fw fa-check"></i></a>

                                                        <a href="{{ route('admin.orders.destroy', $order) }}" class="delete-icons" onclick="event.preventDefault(); document.getElementById('delete-order{{ $order->id }}').submit();">
                                                            <i class="align-middle mr-2 fas fa-fw fa-trash"></i>
                                                        </a>

                                                        <form id="delete-order{{ $order->id }}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: none;">
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


