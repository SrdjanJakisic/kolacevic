@extends('layouts.frontend')

@section('title')
Поруџбине
@endsection

@section('content')

<div class="container py-5 myOrders">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Поруџбине</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Датум наручивања</th>
                                <th>Број за праћење</th>
                                <th>Укупна цена</th>
                                <th>Статус</th>
                                <th>Акције</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                            <tr>
                                <td>{{  date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->trackingNumber }}</td>
                                <td>{{ $item->totalPrice }}</td>
                                <td>{{ $item->orderStatus == '0' ? 'На чекању' : 'Испоручено' }}</td>
                                <td>
                                    <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">Детаљи поруџбине</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection