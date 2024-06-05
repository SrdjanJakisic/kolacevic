@extends('layouts.app')

@section('title')
    Категорије
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Почетна</a></li>
        <li class="breadcrumb-item active" aria-current="page">Категорије</li>
    </ol>
</nav>


    {{-- <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> <a href="{{ url('category/') }}">Категорије </a></h6>
    </div>
</div> --}}

    

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Категорије</h2>
                    <div class="row">
                        @foreach ($category as $item)
                            <div class="col-md-3 mb-3">
                                <a style="text-decoration: none; color: black;"
                                    href="{{ url('view-category/' . $item->id) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/categories/' . $item->image) }}" alt=""
                                            style="height: 200px; width:300px">
                                        <div class="card-body">
                                            <h5>{{ $item->name }}</h5>
                                            <p>{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
