@extends('layouts.admin')

@section('title')
Измени слајдер
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

<div class="card">
    <div class="card-header">
        <h4>Измени слајдер</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-carousel/' . $carousel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Наслов</label>
                    <input type="text" value="{{ $carousel->title }}" class="form-control" name="carouselTitle">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Опис</label>
                    <textarea type="text" rows="3" class="form-control"
                        name="carouselDescription">{{ $carousel->description }}</textarea>
                </div>

                @if ($carousel->image)
                    <img src="{{ asset('assets/uploads/home/' . $carousel->image) }}" alt="">
                @endif
                <div class="col-md-6 mb-3">
                    <label>Слика</label>
                    <input type="file" class="form-control" name="carouselImage" class="product-image">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Потврди</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection