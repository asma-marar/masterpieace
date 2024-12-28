@extends('front.master')
@section('header-class', 'header-v4')

@section('content')
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Content Area -->
            <div class="col-sm-12 col-lg-6 text-center">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0-sm">
                    <!-- Success Icon -->
                    <div class="m-b-30">
                        <i class="zmdi zmdi-check-circle" style="font-size: 4rem; color: #28a745;"></i>
                    </div>
                    <!-- Success Message -->
                    <h4 class="mtext-109 cl2 p-b-15">Order Submitted Successfully!</h4>
                    <p class="stext-115 cl6 p-b-25">
                        Thank you for your purchase. Your order has been successfully placed.
                    </p>
                    <!-- See Order Button -->
                    <a href="{{ route('user.orders.show') }}" 
                       class="flex-c-m stext-101 cl0 size-121 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                        See Your Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
