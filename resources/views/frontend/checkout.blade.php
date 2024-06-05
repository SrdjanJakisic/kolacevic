@extends('layouts.frontend')

@section('title')
Добро дошли у Choco-lab
@endsection

@section('content')

<div class="container mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Основни подаци</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstName">Име:</label>
                                <input type="text" class="form-control" placeholder="Унесите име" name="firstName" value="{{ Auth::user()->firstName }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstName">Презиме:</label>
                                <input type="text" class="form-control" placeholder="Унесите презиме" name="lastName" value="{{ Auth::user()->lastName }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstName">е-пошта:</label>
                                <input type="text" class="form-control" placeholder="Унесите е-пошту" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstName">Телефон:</label>
                                <input type="text" class="form-control" placeholder="Унесите телефон" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstName">Адреса:</label>
                                <input type="text" class="form-control" placeholder="Унесите адресу" name="address" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstName">Град:</label>
                                <input type="text" class="form-control" placeholder="Унесите град" name="city" value="{{ Auth::user()->city }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Детаљи проуџбине</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Назив</th>
                                    <th>Количина</th>
                                    <th>Цена</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item->products->productName }}</td>
                                    <td>{{ $item->productQty }}</td>
                                    <td>{{ $item->products->productPrice }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end order-btn">Поручите</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection