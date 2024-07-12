@extends('layouts.admin')

@section('title')
Админ панел - Детаљи поруџбине
@endsection

@section('content')

<div class="container py-5 adminOrderDetails">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header primary">
                    <h4>Детаљи поруџбине</h4><a href="{{ url('orders') }}" class="btn btn-warning float-right">Назад</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 orders">
                            <h4>Подаци за доставу</h4>
                            <hr>
                            <label for="">Име</label>
                            <div class="border p-2">{{ $order->firstName }}</div>
                            <label for="">Презиме</label>
                            <div class="border p-2">{{ $order->lastName }}</div>
                            <label for="">е-Пошта</label>
                            <div class="border p-2">{{ $order->email }}</div>
                            <label for="">Телефон</label>
                            <div class="border p-2">{{ $order->phone }}</div>
                            <label for="">Адреса</label>
                            <div class="border p-2">{{ $order->adress }}</div>
                            <label for="">Град</label>
                            <div class="border p-2">{{ $order->city }}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Производи</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Назив</th>
                                        <th>Количина</th>
                                        <th>Цена</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->productName }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Укупно: {{ $order->totalPrice }} динара</h4>

                            <div class="mt-5 px-2">
                                <form action="{{ url('update-order/'.$order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="">Статус поруџбине</label>
                                    <select class="form-select" name="orderStatus">
                                        <option {{ $order->orderStatus == '0' ? 'selected' : '' }} value="0">На чекању
                                        </option>
                                        <option {{ $order->orderStatus == '1' ? 'selected' : '' }} value="1">Обрађено
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3 float-end">Обради</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection