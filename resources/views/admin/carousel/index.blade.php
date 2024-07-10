@extends('layouts.admin')

@section('title')
Слајдери
@endsection

@section('content')
@if (session()->has('msg'))
    <br>
    <div class="alert alert-success alertConfig" role="alert">
        <h1>{{ session('msg') }}</h1>
    </div>
    @php
        session()->forget('msg');
    @endphp
@endif

@if (session()->has('msgRed'))
    <br>
    <div class="alert alert-danger alertConfig" role="alert">
        <h1>{{ session('msgRed') }}</h1>
    </div>
    @php
        session()->forget('msgRed');
    @endphp
@endif

<div>
    <div class="card">
        <div class="card-header">
            <h4>Слајдери</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Наслов</th>
                        <th>Опис</th>
                        <th>Урл</th>
                        <th>Слика</th>
                        <th>Акције</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carousel as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->url }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/home/' . $item->image) }}" class="product-image">
                            </td>
                            <td>
                                <a href="{{ url('edit-carousel/' . $item->id) }}" class="btn btn-info">Измени слајдер</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection