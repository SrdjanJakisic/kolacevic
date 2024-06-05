@extends('layouts.admin')

@section('title')
Админ панел - Измени Категорију
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Измени категорију</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'. $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Назив</label>
                    <input type="text" value="{{ $category->name }}" class="form-control" name="categoryName">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" value="{{ $category->slug }}" class="form-control" name="categorySlug">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Статус</label>
                    <input type="checkbox"{{ $category->status == "1" ? 'checked':'' }} class="form-control" name="categoryStatus">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Опис</label>
                    <textarea type="text" rows="3" class="form-control" name="categoryDescription">{{ $category->description }}</textarea>
                </div>

                @if ($category->image)
                    <img src="{{ asset('assets/uploads/categories/'. $category->image) }}" alt="" >
                @endif
                <div class="col-md-6 mb-3">
                    <label>Слика</label>
                    <input type="file" class="form-control" name="categoryImage">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Потврди</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection