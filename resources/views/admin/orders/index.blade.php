@extends('layouts.admin')

@section('title')
Админ панел - Све поруџбине
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Поруџбине на чекању
                        <a href="{{ 'completed-orders' }}" class="btn btn-warning float-right">Извршене поруџбине</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Датум наручивања</th>
                                <th>Број за праћење</th>
                                <th>Укупна цена</th>
                                <th>Статус</th>
                                <th>Акције</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($item->created_at))}}</td>
                                <td>{{ $item->trackingNumber }}</td>
                                <td>{{ $item->totalPrice }}</td>
                                <td>{{ $item->orderStatus == '0' ? 'На чекању' : 'Испоручено' }}</td>
                                <td>
                                    <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-info">Детаљи
                                        поруџбине</a>
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

@if (session()->has('msg'))
<br>
<div class="alert alert-success alertConfig" role="alert">
    <h1>{{ session('msg') }}</h1>
</div>
@php
session()->forget('msg');
@endphp
@endif
@endsection