@extends('layouts.frontend')

@section('title')
Добродошли
@endsection

@section('content')
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        @if (session()->has('msg'))
                <br>
                <div class="alert alert-success alertConfig" role="alert">
                    <h1 style="text-align: center">{{ session('msg') }}</h1>
                </div>
                @php
                    session()->forget('msg');
                @endphp
        @endif
    </div>
</div>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($homepage as $item)
            <div class="carousel-item active">
                <img src="{{ asset('assets/uploads/home/' . $item->image) }}" alt="...">
                <div class="carousel-caption d-none d-md-block" style='background-color: rgba(0, 0, 0, 0.4);'>
                    <h1>{{$item->title}}</h1>
                    <p>{{$item->description}}</p>
                    <a type="button" href="{{ url($item->url) }}" class="btn btn-info">Иди на страницу</a>
                </div>
            </div>

        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection