@extends('layouts.frontend')

@section('title')
Контактирајте нас
@endsection

@section('content')

<div class="container contact">
    <br>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-md-5">
            <h1>Где нас можете наћи:</h1>
            <hr class="hr" />
            <div class="banner">
                <i class="fa-brands fa-square-instagram"></i> <a rel="stylesheet" href="https://www.instagram.com/kolacevic.poslasticarnica/"> Посетите наш Инстаграм! </a> <br>
                <i class="fa-brands fa-facebook"></i> <a rel="stylesheet" href="https://www.facebook.com/kolacevic.poslasticarnica/"> Посетите наш Фејсбук! </a> <br>
                <i class="fa-solid fa-phone"></i>  062 721013 <br>
                <i class="fa-solid fa-envelope"></i> kolacevicslatkarije@gmail.com
                <br>
                <br>
                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.5371571673145!2d20.635712576163137!3d44.87171647107045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7ff45ea3d997%3A0x28f702432903b79e!2zUG9zbGFzdGnEjWFybmljYSBLb2xhxI1ldmnEhw!5e0!3m2!1ssr!2srs!4v1720635573995!5m2!1ssr!2srs"
                        width="100%" height="360" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div> 
        </div>
        <div class="col-md-5">
            <h1>Пошаљите нам поруку:</h1>
            <hr class="hr" />
            <form>
                <div class="form-group">
                    <label for="email">Ваша имејл адреса</label>
                    <input type="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ваше име и презиме</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ваш број телефона</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Порука</label>
                    <textarea type="text" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary contactbutton">Пошаљите</button>
            </form>
        </div>
    </div>
</div>
@endsection