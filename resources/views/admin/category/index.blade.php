@extends('layouts.admin')

@section('title')
Админ панел - Категорије
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
            <h4>Категорије</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назив</th>
                        <th>Опис</th>
                        <th>Слика</th>
                        <th>Акције</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/categories/'.$item->image) }}" class="product-image">
                            </td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-info">Измени категорију</a>
                                <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Обриши категорију</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection