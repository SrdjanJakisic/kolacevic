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
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="$myCarousel" data-slide-to="0" class="0"></li>
        <li data-target="$myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div>
                <div class="container">
                    <h1>Example Headline</h1>
                    <p>Морам данас урадити бар ову глупу прву страницу а онда сутра страну о нама и контракт страну и да
                        научим
                        Бутрстрап и ХТМЛ поново</p><a href="#" class="btn btn-lg btn-primary">Radi li</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div>
                <div class="container">
                    <h1>Example Headline</h1>
                    <p>Морам данас урадити бар ову глупу прву страницу а онда сутра страну о нама и контракт страну и да
                        научим
                        Бутрстрап и ХТМЛ поново</p><a href="#" class="btn btn-lg btn-primary">Radi li</a>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection