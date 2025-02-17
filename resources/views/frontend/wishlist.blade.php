@extends('layouts.frontend')

@section('title')
Листа жеља
@endsection

@section('content')
<div class="prodTitle">
    <h1>Листа жеља</h1>
</div>

<div class="container my-3 wishlist">
    <div class="card shadow">
        <div class="card-body">
            @if($wishlist->count() > 0)
                <div class="card-body">
                    @foreach ($wishlist as $item)
                        <br>
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->productImage) }}" alt="Слика"
                                    height="70px" width="70px">
                            </div>
                            <div class="col-md-2">
                                <h6>Назив: {{ $item->products->productName }}</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Цена: {{ $item->products->productPrice }}</h6>
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" class="productId" value="{{ $item->productId }}">
                                @if ($item->products->productQuantity >= $item->productQty)
                                    <div class="input-group text-center mb-3 plusMinus">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                @else
                                    <h6>Нема на стању!</h6>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="button" data-url="{{route('addToCart')}}"
                                    class="btn btn-success me-3 addToCartBtn float-start"> <i
                                        class="fa-solid fa-cart-shopping"></i> Додај у корпу</button>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-danger remove-wishlist-item"><i class="fa-solid fa-trash-can"></i> Обриши</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h4>Листа жеља је празна</h4>
            @endif
        </div>
    </div>
</div>
@endsection