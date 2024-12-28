@extends('front.master')
@section('header-class', 'header-v4')

@section('content')
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
            @if($wishlistedProducts->isEmpty())
            <p>No products in wishlist</p>
            @else
            <div class="row isotope-grid">
            @foreach ($wishlistedProducts as $wishlist)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <!-- Make the image a clickable link -->
                        <a href="{{ route('user.detail', ['id' => $wishlist->product->id]) }}">
                            <img src="{{ asset( $wishlist->product->image ) }}" alt="IMG-PRODUCT" style="width: 100%; height: 300px; object-fit: cover;">
                        </a>

                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l">
                            <!-- Update this link as well -->
                            <a href="{{ route('user.detail', ['id' => $wishlist->product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $wishlist->product->name }}
                            </a>
                            <span class="stext-105 cl3">
                                {{ $wishlist->product->price }}
                            </span>
                        </div>
                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="javascript:void(0)" class="wishlist-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $wishlist->product->id }}">
                                @if(Auth::guard('customer')->check() && $wishlist->product->wishlists()->where('customer_id', Auth::guard('customer')->id())->exists())
                                    <i class="zmdi zmdi-favorite text-danger"></i>
                                @else
                                    <i class="zmdi zmdi-favorite-outline"></i>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
</div>
@endif
</div>
<section>
@endsection

{{-- <i class="zmdi zmdi-favorite-outline" style="font-size: 24px;"></i> --}}
