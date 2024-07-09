@extends('layouts.frontend')

@section('title')
Добродошли
@endsection

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/uploads/home/homeimg1.jpg') }}" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>{{$firstSlide->title}}</h1>
                <p>{{$firstSlide->description}}</p>
                    <button type="button" class="btn btn-info">Иди на страницу</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/uploads/home/homeimg1.jpg') }}" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>{{$secondSlide->title}}</h1>
                <p>{{$secondSlide->description}}</p>
                    <button type="button" class="btn btn-info">Иди на страницу</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/uploads/home/homeimg1.jpg') }}" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>{{$thirdSlide->title}}</h1>
                <p>{{$thirdSlide->description}}</p>
                    <button type="button" class="btn btn-info">Иди на страницу</button>
            </div>
        </div>
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