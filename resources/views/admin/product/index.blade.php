@extends('layouts.admin')

@section('title')
Админ панел - Производи
@endsection

@section('content')

@if (session()->has('msg'))
<br>
<div class="alert alert-success alertConfig" role="alert">
    <h1>{{ session('msg') }}</h1>
</div>
@php
session()->forget('msg');
@endphp
@endif

<div>
    <div class="card">
        <div class="card-header">
            <h4 style="font-weight:bold;">Производи</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назив</th>
                        <th>Категорија</th>
                        <th>Опис</th>
                        <th>Слика</th>
                        <th>Цена</th>
                        <th>Количина</th>
                        <th>Тежина</th>
                        <th>Акције</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->productDescription }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$item->productImage) }}" class="product-image">
                            </td>
                            <td>{{ $item->productPrice }}</td>
                            <td>{{ $item->productQuantity }}</td>
                            <td>{{ $item->productWeight }}</td>
                            <td>
                                <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-info">Измени производ</a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger">Обриши производ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection