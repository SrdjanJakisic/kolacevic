@extends('layouts.frontend')

@section('title')
Корпа
@endsection

@section('content')
<div class="prodTitle">
    <h1>Корпа</h1>
</div>

<div class="container my-5 cartCont">
    <div class="card shadow">
        @if($cartItems->count() > 0)
        <div class="card-body">
            @foreach ($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/products/'.$item->products->productImage) }}" alt="Слика"
                        height="70px" width="70px">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{ $item->products->productName }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->products->productPrice }}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="productId" value="{{ $item->productId }}">
                    @if ($item->products->productQuantity >= $item->productQty)
                    <label for="Quantity">Количина</label>
                    <div class="input-group text-center mb-3">
                        <button class="input-group-text changeQty decrement-btn">-</button>
                        <input type="text" name="quantity" value="{{ $item->productQty }}"
                            class="form-control qty-input text-center">
                        <button class="input-group-text changeQty increment-btn">+</button>
                    </div>
                    @else
                    <h6>Нема на стању!</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <a class="btn btn-danger delete-cart-item"><i class="fa-solid fa-trash-can"></i> Обриши</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer discount_data">
            <h6>Укупна цена:{{ $total_price }}
                <input type="hidden" name="total_price" value="{{ $total_price }}">
                @if (Auth::user()->points > 5)
                <input type="checkbox" name="discount" class="discount5" value="5"> <label>Да ли желите да искористе попуст?</label>
                <button class="btn btn-outline-success discount">Примените попуст</button>
                @endif
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Наставите на излаз</a>
            </h6>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Ваша <i class="fa-solid fa-cart-shopping"></i> је празна </h2>
        </div>
        @endif
    </div>
</div>
@endsection