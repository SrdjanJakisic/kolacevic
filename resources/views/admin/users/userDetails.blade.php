@extends('layouts.admin')

@section('title')
Админ панел - Детаљи корисника
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Детаљи корисника
                        <a href="{{ url('users') }}" class="btn btn-info float-right">Повратак на кориснике</a>
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Улога</label>
                            <div class="p2 border">{{ $user->role_as == '0' ? 'Корисник' : 'Админ' }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Име</label>
                            <div class="p2 border">{{ $user->firstName }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Презиме</label>
                            <div class="p2 border">{{ $user->lastName }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">е-Пошта</label>
                            <div class="p2 border">{{ $user->email }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Телефон</label>
                            <div class="p2 border">{{ $user->phone }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Адреса</label>
                            <div class="p2 border">{{ $user->address }}</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Град</label>
                            <div class="p2 border">{{ $user->city }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection