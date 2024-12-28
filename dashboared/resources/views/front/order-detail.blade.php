@extends('front.master')

@section('header-class', 'header-v4')
@section('title', 'Checkout')

@section('content')

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/cart" class="stext-109 cl8 hov-cl1 trans-04">
            Shopping Cart
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Checkout
        </span>
    </div>
</div>

<!-- Checkout Content -->
<div class="container p-t-50 p-b-50">
    <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-6 m-b-50">
            <h4 class="mtext-109 cl2 p-b-20">
                Billing Details
            </h4>
            <div class="bor10 p-l-40 p-r-40 p-t-30 p-b-40">
                <p class="stext-111 cl2 p-b-10"><strong>Full Name:</strong> {{ $customer->name }}</p>
                <p class="stext-111 cl2 p-b-10"><strong>Email Address:</strong> {{ $customer->email }}</p>
                <p class="stext-111 cl2 p-b-10"><strong>Phone Number:</strong> {{ $customer->phone }}</p>
                <p class="stext-111 cl2 p-b-10"><strong>Street Address:</strong> {{ $customer->address }}</p>
                <p class="stext-111 cl2 p-b-10"><strong>City:</strong> {{ $customer->city }}</p>

                <a href="{{ route('user.profile') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Edit Billing Details
                </a>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-6 m-b-50">
            <h4 class="mtext-109 cl2 p-b-20">
                Order Summary
            </h4>
                
            <!-- Product Details -->
            <div class="bor10 p-l-40 p-r-40 p-t-30 p-b-30 m-b-30">
                <h5 class="mtext-109 cl2 p-b-20">Product Details</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-light">
                            <th class="p-2">Product Name</th>
                            <th class="p-2">Quantity</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItem as $item)
                        <tr>
                            <td class="p-2">{{ $item->product->name }}</td>
                            <td class="p-2">{{ $item->quantity }}</td>
                            <td class="p-2">${{ number_format($item->product->price, 2) }}</td>
                            <td class="p-2">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Order Costs -->
            <div class="bor10 p-l-40 p-r-40 p-t-30 p-b-40">
                @php
                    $subtotal = 0;
                    $shipping = 5.00;
                    
                    foreach ($cartItem as $item) {
                        $subtotal += $item->product->price * $item->quantity;
                    }
                    
                    $total = $subtotal + $shipping;
                @endphp
            
                <div class="flex-w flex-t bor12 p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">Subtotal:</span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">${{ number_format($subtotal, 2) }}</span>
                    </div>
                </div>
            
                <div class="flex-w flex-t bor12 p-b-13 p-t-15">
                    <div class="size-208">
                        <span class="stext-110 cl2">Shipping:</span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">${{ number_format($shipping, 2) }}</span>
                    </div>
                </div>
            
                <div class="flex-w flex-t p-t-27 p-b-33">
                    <div class="size-208">
                        <span class="mtext-101 cl2">Total:</span>
                    </div>
                    <div class="size-209 p-t-1">
                        <span class="mtext-110 cl2">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            
                <form action="{{ route('user.order.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Place Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
