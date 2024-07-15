@extends('layouts.admin')

@section('title')
Поруке
@endsection

@section('content')

<div>
    <div class="card">
        <div class="card-header">
            <h4 style="font-weight:bold;">Поруке</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Имејл</th>
                        <th>Име</th>
                        <th>Телефон</th>
                        <th>Порука</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $item)
                        <tr>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection