@extends('layouts.master')

@section('title', 'Orders')
@section('name', 'Order Detail')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Order Details </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table id="exampleTable" class="table table-boardered">
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
                    
                <tr>
                    <td rowspan="{{ $order->orderProducts->count() + 1 }}">{{ $order->order_address }}</td> <!-- Order Address, spanning rows -->
                    <td rowspan="{{ $order->orderProducts->count() + 1 }}">{{ $order->created_at }}</td> <!-- Order Date, spanning rows -->
                    <td rowspan="{{ $order->orderProducts->count() + 1 }}">{{ $order->order_total }}</td> <!-- Total, spanning rows -->

                    @foreach ($order->orderProducts as $index => $orderProduct)
                        <!-- Displaying each product in a separate row -->
                        @if ($index == 0) <!-- For the first product, display the other columns, others just show products -->
                            <td>{{ $orderProduct->product->name }}</td> <!-- Product Name -->
                            <td>{{ $orderProduct->quantity }}</td> <!-- Quantity -->
                            <td>{{ $orderProduct->price }}</td> <!-- Price -->
                        </tr>
                        @else
                            <tr>
                                <td>{{ $orderProduct->product->name }}</td> <!-- Product Name -->
                                <td>{{ $orderProduct->quantity }}</td> <!-- Quantity -->
                                <td>{{ $orderProduct->price }}</td> <!-- Price -->
                            </tr>
                        @endif
                    @endforeach
                </tr>

            </tbody>
        </table>
    </div>
    </div>

</div>
@endsection