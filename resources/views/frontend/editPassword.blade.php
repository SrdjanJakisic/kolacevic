@extends('layouts.frontend')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Промените шифру</h4>
    </div>
    <div class="card-body editPassword">
        <form action="{{ url('update-password/'. $user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label>Унесите шифру</label>
                    <input type="text" class="form-control" name="password1">
                </div>
                <div class="col-md-6">
                    <label>Потврдите шифру</label>
                    <input type="text" rows="3" class="form-control" name="password2">
                </div>
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-success">Потврди</button>
                </div>
                <div class="col-md-6 mb-3">
                    <a class="btn btn-success" href="{{ url('edit-user/') }}">Повратак</a>
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