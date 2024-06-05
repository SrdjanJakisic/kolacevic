@extends('layouts.frontend')

@section('title')
Добро дошли у Choco-lab
@endsection

@section('content');
<div class="hProducts">
    <h1>Органске чоколаде</h1>
</div>


<div class="container card-config">
    @foreach ($OrganicProducts as $prod)
    <div class="card border-primary mb-3 cardBorderConfig">
        <div class="card-header cardHeaderConfig">
            <img src="{{ asset('assets/uploads/products/'.$prod->productImage) }}" height="300" width="250" alt="Product image">
        </div>
        <div class="card-body">
            <h3 class="prodTitle">{{ $prod->productName }}</h3>
            <p>Цена: {{ $prod->productPrice }}</p>
            <p>Тежина: {{ $prod->productWeight }}</p>

            <div class="cartButtons">
                <a class="btn btn-info" href="{{ url('organic/'.$prod->id) }}">Детаљи</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection