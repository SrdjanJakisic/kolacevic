@extends('layouts.admin')

@section('title')
Админ панел - Измени производ
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Измени производ</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-products/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Назив</label>
                    <input type="text" class="form-control" name="productName" value="{{ $products->productName }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Опис</label>
                    <textarea type="text" rows="3" class="form-control"
                        name="productDescription">{{ $products->productDescription }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Цена</label>
                    <input type="text" class="form-control" name="productPrice" value="{{ $products->productPrice }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Количина</label>
                    <input type="text" class="form-control" name="productQuantity"
                        value="{{ $products->productQuantity }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Тежина</label>
                    <input type="text" class="form-control" name="productWeight" value="{{ $products->productWeight }}">
                </div>
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="categoryId">
                        <option value="{{ $products->category->id }}">Тренутно: {{ $products->category->name }}</option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($products->productImage)
                <img src="{{ asset('assets/uploads/products/'.$products->productImage) }}" class="product-image">
                @endif
                <div class="col-md-6 mb-3">
                    <label>Слика</label>
                    <input type="file" class="form-control" name="productImage">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Потврди</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection