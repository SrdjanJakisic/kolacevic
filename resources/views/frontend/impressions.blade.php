@extends('layouts.frontend')

@section('title')
Утисци
@endsection

@section('content')
<form action="{{ url('add-impression') }}" method="POST">
    @csrf

    <h1>Сви утисци</h1>
    <div class="container my-3">
        <div class="form-floating">
            <textarea class="form-control" id="floatingTextarea"></textarea><br>
            <label for="floatingTextarea"></label>
        </div>
        <h1>Нема коментара</h1>
        <div class="form-floating">
            <textarea class="form-control" name="impresionComment" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Унесите ваш утисак</label>
        </div><br>
        <button type="submit" class="btn btn-primary">Коментариши</button>
    </div>
</form>


@endsection