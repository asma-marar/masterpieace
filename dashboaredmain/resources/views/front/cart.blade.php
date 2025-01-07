@extends('front.master')

@section('header-class', 'header-v4')
@section('title', 'Cart')

@section('content')

<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <!-- Page Title on the Left -->
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Shopping Cart
            </h3>
        </div>
        <!-- Shopping Cart -->
        <form class="bg0 p-t-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2">Name</th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                        <th class="column-6">Delete</th>
                                    </tr>

                                    @php
                                        $subtotal = 0;  // Initialize subtotal here, outside the if statement
                                    @endphp

                                    @if($cart && $cart->items->count() > 0)
                                        @foreach($cart->items as $item)
                                            @php
                                                $itemTotal = $item->product->price * $item->quantity;
                                                $subtotal += $itemTotal;
                                            @endphp
                                                <tr class="table_row">
                                                    <td class="column-1">
                                                        <div class="how-itemcart1">
                                                            <img src="{{ asset($item->product->image) }}" alt="IMG" style="width: 100%; height: 100px; object-fit: cover; border-radius: 2px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                                        </div>
                                                    </td>
                                                    <td class="column-2">{{ $item->product->name }}</td>
                                                    <td class="column-3">${{ $item->product->price }}</td>
                                                    <td class="column-4">
                                                        <div class="quantity-control flex items-center justify-center">
                                                            <button class="qty-btn minus bg-gray-200 px-2 py-1 rounded-l text-sm">-</button>
                                                            <input class="qty-input text-center w-12 border-0 py-1" 
                                                                type="text" 
                                                                readonly
                                                                name="quantity[{{ $item->id }}]" 
                                                                value="{{ $item->quantity }}"
                                                                data-max="{{ $item->product->quantity }}">
                                                            <button class="qty-btn plus bg-gray-200 px-2 py-1 rounded-r text-sm">+</button>
                                                        </div>
                                                        
                                                    </td>
                                                    <td class="column-5">${{ $itemTotal }}</td>
                                                    <td class="column-6">
                                                        <a href="{{ url('user/cart/delete/' . $item->id) }}" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>  
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center p-4">Your cart is empty</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Subtotal:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2">
                                        ${{ number_format($subtotal, 2) }}
                                    </span>

                                </div>

                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Shipping
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2">
                                        $5
                                    </span>

                                </div>
                            </div>


                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    @php
                                    $shippingCost = 5; // Fixed shipping cost
                                    $total = $subtotal + $shippingCost;
                                    @endphp
                                    <span class="mtext-110 cl2">
                                        ${{ number_format($total, 2) }}
                                    </span>
                                </div>
                            </div>

                            <a href="{{ route('user.order.checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
