@extends('layouts.frontend')

@section('title')
Поруџбине
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Детаљи поруџбине
                        <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Назад</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($order->firstName != null)
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
                                        <th>Слика</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->productName }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/products/'.$item->products->productImage) }}"
                                                width="50px" alt="Слика производа">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Укупно: {{ $order->totalPrice }} динара</h4>
                        </div>
                    </div>
                    @else
                    <h1>Детаљи поруџбине нису доступини</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection