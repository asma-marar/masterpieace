@extends('layouts.master')

@section('title', 'Orders')
@section('name', 'Order Detail')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Order Details</h4>
        </div>
        <div class="card-body">

            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Address</th>
                        <th>Order Date</th>
                        <th>Total</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderProducts as $index => $orderProduct)
                        <tr>
                            <!-- Only show the address, date, and total once (in the first row) -->
                            @if ($index == 0)
                                <td rowspan="{{ $order->orderProducts->count() }}">{{ $order->order_address }}</td>
                                <td rowspan="{{ $order->orderProducts->count() }}">{{ $order->created_at }}</td>
                                <td rowspan="{{ $order->orderProducts->count() }}">{{ $order->order_total }}</td>
                            @endif

                            <!-- Product Details -->
                            <td>{{ $orderProduct->product->name }}</td>
                            <td>{{ $orderProduct->quantity }}</td>
                            <td>{{ $orderProduct->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
