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

    {{-- <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"> <a href="{{ url('category/') }}">Категорије / <a href="">{{ $category->name }}</a></h6>
        </div>
    </div> --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Почетна</a></li>
            <li class="breadcrumb-item"><a href="{{ url('category') }}">Категорије</a></li>
            <li class="breadcrumb-item active" aria-current="page">Производи</li>
        </ol>
    </nav>

    <div>
        Сортирај по: <a href="{{ url('sort-by-price-desc/' . $category->id) }}" style="text-decoration: none;">цени опадајуће</a>, <a
            href="{{ url('sort-by-price-asc/'. $category->id) }}" style="text-decoration: none;">цени растуће</a>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/' . $item->productImage) }}" alt=""
                                style="height: 200px; width:300px">
                            <div class="card-body">
                                <h5>{{ $item->productName }}</h5>
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

    {{-- <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a style="text-decoration: none; color: black;"
                                href="{{ url('view-category/' . $category->id . '/' . $item->id) }}">
                                <img src="{{ asset('assets/uploads/products/' . $item->productImage) }}" alt="" style="height: 200px; width:300px">
                                <div class="card-body">
                                    <h5>{{ $item->productName }}</h5>
                                    <span class="float-start">Цена: {{ $item->productPrice }}рсд</span>
                                    <span class="float-end">Тежина: {{ $item->productWeight }}г</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
