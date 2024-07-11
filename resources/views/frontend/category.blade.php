@extends('layouts.frontend')

@section('title')
Категорије
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Почетна</a></li>
        <li class="breadcrumb-item active" aria-current="page">Категорије</li>
    </ol>
</nav>

<div class="py-5">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <h1>Категорије</h1>
                <hr>
                <div class="row">
                    @foreach ($category as $item)
                        <div class="col-md-3 mb-3">
                            <a style="text-decoration: none; color: black;" href="{{ url('view-category/' . $item->id) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/categories/' . $item->image) }}" alt="">
                                    <div class="card-body">
                                        <h3>{{ $item->name }}</h3>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection