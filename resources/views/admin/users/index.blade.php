@extends('layouts.admin')

@section('title')
    Админ панел - Корисници
@endsection

@section('content')
    <div>
        <div class="card">
            <div class="card-header">
                <h4>Корисници</h4>
                <hr>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-3">Име</th>
                            <th class="col-md-3">е-Пошта</th>
                            <th class="col-md-3">Акције</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            @if ($item->role_as == 0)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->firstName . ' ' . $item->lastName }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('view-user/' . $item->id) }}" class="btn btn-info">Детаљи</a>
                                        <a href="{{ url('delete-user/' . $item->id) }}" class="btn btn-danger">Обриши</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Менаџери</h4>
                <hr>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-3">Име</th>
                            <th class="col-md-3">е-Пошта</th>
                            <th class="col-md-3">Акције</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            @if ($item->role_as == 2)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->firstName . ' ' . $item->lastName }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <a href="{{ url('view-user/' . $item->id) }}" class="btn btn-info">Детаљи</a>
                                        <a href="{{ url('delete-user/' . $item->id) }}" class="btn btn-danger">Обриши</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ url('create-manager') }}" class="btn btn-success">Креирај менаџера</a>
            </div>
        </div>
        @if (session()->has('msg'))
            <br>
            <div class="alert alert-success alertConfig" role="alert">
                <h1>{{ session('msg') }}</h1>
            </div>
            @php
                session()->forget('msg');
            @endphp
        @endif
    </div>
@endsection
