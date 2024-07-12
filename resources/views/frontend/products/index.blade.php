@extends('layouts.frontend')

@section('title')
Производи
@endsection

@section('content')
@if (session()->has('msg'))
    <br>
    <div class="alert alert-success alertConfig" role="alert">
        <h1 style="text-align: center">{{ session('msg') }}</h1>
    </div>
    @php
        session()->forget('msg');
    @endphp
@endif

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Почетна</a></li>
        <li class="breadcrumb-item"><a href="{{ url('category') }}">Категорије</a></li>
        <li class="breadcrumb-item active" aria-current="page">Производи</li>
    </ol>

</nav>

<div class="py-5" product>
    <div class="container card productCard">
        <div class="row">
            <h1>{{ $category->name }}</h1>
            <hr>
            <div class="sort">
                Сортирај по: <a href="{{ url('sort-by-price-desc/' . $category->id) }}"
                    style="text-decoration: none;">цени
                    опадајуће</a>, <a href="{{ url('sort-by-price-asc/' . $category->id) }}"
                    style="text-decoration: none;">цени
                    растуће</a>
            </div>
            @foreach ($products as $item)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/' . $item->productImage) }}" alt="">
                        <div class="card-body">
                            <h3>{{ $item->productName }}</h3>
                            <input type="text" value="{{ $item->id }}" class="productId" hidden>
                            <input type="text" value="1" class="qty-input" hidden>
                            <span class="float-start">Цена: {{ $item->productPrice }}рсд</span>
                            <span class="float-end">Тежина: {{ $item->productWeight }}г</span>
                            <a class="btn btn-primary"
                                href="{{ url('view-category/' . $category->id . '/' . $item->id) }}">Детаљи</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection