@extends('layouts.frontend')

@section('title')
Добродошли
@endsection

@section('content')

<style>
    .carousel-item {
        height: 32rem;
        background: #777;
        color: white;
        position: relative;
    }

    .container {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding-bottom: 50px;
    }
</style>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <h1>ПРИМЕР 1</h1>
        </div>
        <div class="carousel-item">
            <h1>ПРИМЕР 2</h1>
        </div>
        <div class="carousel-item">
            <h1>ПРИМЕР 3</h1>
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