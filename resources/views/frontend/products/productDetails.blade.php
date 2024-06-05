@extends('layouts.frontend')

@section('title', $productDetails->productName)

@section('content')
<br><br>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$productDetails->productImage) }}" class="w-100"
                        alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $productDetails->productName }}
                    </h2>
                    <hr>
                    <label class="me-3">Цена: {{ $productDetails->productPrice }} динара</label>
                    <p class="mt-3">
                        {{ $productDetails->productDescription }}
                    </p>
                    <p><label class="me-3">Категорија: {{ $productDetails->category->categoryName }}</label></p>
                    <p><label class="me-3">На залихама: {{ $productDetails->productQuantity }}</label></p>
                    <hr>
                    @if($productDetails->productQuantity > 0)
                    <label class="badge bg-success">На стању</label>
                    @else
                    <label class="badge bg-danger">Није на стању</label>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $productDetails->id }}" class="productId">
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
                            @if($productDetails->productQuantity > 0)
                            <button type="button" class="btn btn-success me-3 addToCartBtn float-start"> <i
                                    class="fa-solid fa-cart-shopping"></i> Додај у корпу</button>
                            @endif
                            <button type="button" class="btn btn-primary me-3 addToWishlist float-start"> <i
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

@section('scripts')

@endsection