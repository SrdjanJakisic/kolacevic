@extends('layouts.frontend')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Промените податке</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-user/'. $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Име</label>
                    <input type="text" class="form-control" name="firstName" value="{{ $user->firstName }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Презиме</label>
                    <input type="text" rows="3" class="form-control" name="lastName" value="{{ $user->lastName }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>е-Пошта</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Адреса</label>
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Град</label>
                    <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Телефон</label>
                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>

                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-success">Потврди</button>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-success" href="{{ url('edit-password/' . $user->id) }}">Промените шифру</a>
                </div>
            </div>
            @if (session()->has('msg'))
            <br>
            <div class="alert alert-success alertConfig" role="alert">
                <h1 style="text-align: center">{{ session('msg') }}</h1>
            </div>
            @php
            session()->forget('msg');
            @endphp
            @endif
        </form>

    </div>
</div>
@endsection