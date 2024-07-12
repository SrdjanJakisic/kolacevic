@extends('layouts.frontend')

@section('title', $products->productName)

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Почетна</a></li>
        <li class="breadcrumb-item"><a href="{{ url('category') }}">Категорије</a></li>
        <li class="breadcrumb-item"><a href="{{ url('view-category/' . $products->category->id) }}">Производи</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $products->productName }}</li>
    </ol>
</nav>

<div class="container productDetails">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$products->productImage) }}" class="w-100"
                        alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->productName }}
                    </h2>
                    <hr>
                    <p class="mt-3"> Цена: {{ $products->productPrice }} динара</p>
                    <p class="mt-3"> Опис: {{ $products->productDescription }}</p>
                    <p class="mt-3"> Категорија: {{ $products->category->name }}</p>
                    <hr>
                    @if($products->productQuantity > 0)
                    <label class="badge bg-success">На стању</label>
                    @else
                    <label class="badge bg-danger">Није на стању</label>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="productId">
                            <label for="Quantity">Количина</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        @if (Auth::user() != null)
                        <div class="col-md-9">
                            <br>
                            @if (Auth::user()->role_as == '0')
                            @if($products->productQuantity > 0)
                            <button type="button" data-url="{{route('addToCart')}}" class="btn btn-success me-3 addToCartBtn float-start"> <i
                                    class="fa-solid fa-cart-shopping"></i> Додај у корпу</button>
                            @endif
                            <button type="button" data-url="{{route('addToWishlist')}}" class="btn btn-primary me-3 addToWishlist float-start"> <i
                                    class="fa-regular fa-heart"></i> Додај на листу жеља</button>
                            @endif

                        </div>
                        @else
                        <div class="col-md-9">
                            <br>
                            <a href="{{ route('login') }}" style="text-decoration: none;"><h4>Да би сте наручили морате бити регистровани</h4></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection