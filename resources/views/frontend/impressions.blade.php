@extends('layouts.frontend')

@section('title')
Утисци
@endsection

@section('content')

<h1>Сви утисци</h1>
<div class="container my-3">
    @foreach ($impression as $item)
        <div class="form-floating">
            <textarea class="form-control" id="floatingTextarea">{{ $item->impressionComment }}</textarea><br>
            <label for="floatingTextarea">Биће USERNAME оног ко је оставио утисак</label>
        </div>
    @endforeach
    <h1>Додајте утисак:</h1>
    <form action="{{ url('add-impression') }}" method="POST">
    @csrf
    <div class="form-floating">
        <textarea class="form-control" name="impresionComment" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Унесите ваш утисак</label>
    </div><br>
    <button type="submit" class="btn btn-primary">Коментариши</button>
    </form>
</div>


@endsection