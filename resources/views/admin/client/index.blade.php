@extends('layouts.app-admin')

@section('title-block', 'Клиенты')

@section('content')
    <div class="header">
        <h1 class="header-title">
            Клиенты
        </h1>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-right">

                            <a href="{{ route('admin.client.index') }}" class="mr-1">
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
                        <h5 class="card-title mb-0">Список клиентов:</h5>
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
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 104px;">
                                                    Имя
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 204px;">
                                                    Почта
                                                </th>
                                                <th  tabindex="0" aria-controls="datatables-clients" rowspan="1" colspan="1" style="width: 204px;">
                                                    Дата создание
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clients as $client)
                                                <tr role="row" class="odd">
                                                    <td> {{ $client->id }}</td>
                                                    <td>{{ $client->name }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->created_at->format('H:i d/m/Y') }}</td>
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
