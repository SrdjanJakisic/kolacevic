@extends('layouts.admin')

@section('title')
Админ панел - Додај производ
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Додај производ</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Назив</label>
                    <input type="text" class="form-control" name="productName">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Цена</label>
                    <input type="text" class="form-control" name="productPrice">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Количина</label>
                    <input type="text" class="form-control" name="productQuantity">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Тежина</label>
                    <input type="text" class="form-control" name="productWeight">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Опис</label>
                    <textarea type="text" rows="3" class="form-control" name="productDescription"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <select class="form-select" name="categoryId">
                        <option value="">Изаберите категорију</option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
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