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
                <h1>Пример 1</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi prta gravida at
                    eget
                    metus. Nullam id dolor id nibh ultricies cehuicla ut id elit</p>
                    <button type="button" class="btn btn-info">Иди на страницу</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/uploads/home/homeimg1.jpg') }}" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Пример 2</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi prta gravida at
                    eget
                    metus. Nullam id dolor id nibh ultricies cehuicla ut id elit</p>
                    <button type="button" class="btn btn-info">Иди на страницу</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/uploads/home/homeimg1.jpg') }}" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1>Пример 3</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi prta gravida at
                    eget
                    metus. Nullam id dolor id nibh ultricies cehuicla ut id elit</p>
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
<!-- <div class="container">
  <div class="row">
    <div class="col-md" style="background-color: green;">
      One of three columns
    </div>
    <div class="col-md" style="background-color: red;">
      One of three columns
    </div>
  </div>
</div> -->

@endsection