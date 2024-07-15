@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white" style="width: 300px; display: inline-block; margin-top:14px; font-weight:bold;">
                    Додај менаџера</h4><a href="{{ url('users') }}" class="btn btn-warning float-right">Назад</a>
            </div>
            <div class="card-body">
                <form action="{{ url('insert-manager') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Име</label>
                            <input type="text" class="form-control" name="firstName">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Презиме</label>
                            <input type="text" rows="3" class="form-control" name="lastName">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>е-Пошта</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Адреса</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Град</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Телефон</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Шифра</label>
                            <input type="text" class="form-control" name="password">
                        </div>

                        <input type="hidden" class="form-control" name="role_as" value="2">

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Потврди</button>
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
    </div>
</div>

@endsection