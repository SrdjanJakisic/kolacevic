@extends('layouts.frontend')

@section('title')
Утисци
@endsection

@section('content')

<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="container my-3">
            <h1>Сви утисци</h1>
            @foreach ($impression as $item)
                <div class="form-floating">
                    <textarea class="form-control" id="floatingTextarea">{{ $item->impressionComment }}</textarea><br>
                    <label for="floatingTextarea">{{ $item->name }} ({{ $item->email }})</label>
                </div>
            @endforeach
            @if (Auth::user() != null)
                <div>
                    <br>
                    @if (Auth::user()->role_as == '0')
                        <form action="{{ url('add-impression') }}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <textarea class="form-control" name="impresionComment" id="floatingTextarea"
                                    required></textarea>
                                <label for="floatingTextarea">Унесите ваш утисак</label>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Коментариши</button>
                        </form>
                    @endif
                </div>
            @else
                <div class="col-md-9">
                    <br>
                    <a href="{{ route('login') }}" style="text-decoration: none;">
                        <h4>Да би сте додали утисак морате бити регистровани</h4>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection