@extends('front.master')
@section('header-class', 'header-v4')

@section('content')
<div class="container">
    <div class="p-t-60 p-b-20">
        <h4 class="cl2 text-center p-b-30">
            Rate and Review
        </h4>

        @forelse ($unratedSellers as $seller)
            <div class="row justify-content-center">
                <div class="col-sm-8 p-b-30">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="cl2 p-b-10">
                            Rate {{ $seller->name }}
                        </h4>
                        <p class="stext-111 cl6 p-b-20">
                            {{ $seller->email }}
                        </p>

                        <form action="{{ route('user.rating.store') }}" method="POST">
                            @csrf
                            <!-- Hidden fields for required data -->
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="rated_customer_id" value="{{ $seller->id }}">
                            
                            <div class="p-b-20">
                                <label class="stext-111 cl2 p-b-10">Rating</label>
                                <div class="star-rating flex-l p-t-10">
                                    <input type="radio" id="star5-{{ $seller->id }}" name="rating" value="5" required/>
                                    <label for="star5-{{ $seller->id }}" title="5 stars"></label>
                                    
                                    <input type="radio" id="star4-{{ $seller->id }}" name="rating" value="4" />
                                    <label for="star4-{{ $seller->id }}" title="4 stars"></label>
                                    
                                    <input type="radio" id="star3-{{ $seller->id }}" name="rating" value="3" />
                                    <label for="star3-{{ $seller->id }}" title="3 stars"></label>
                                    
                                    <input type="radio" id="star2-{{ $seller->id }}" name="rating" value="2" />
                                    <label for="star2-{{ $seller->id }}" title="2 stars"></label>
                                    
                                    <input type="radio" id="star1-{{ $seller->id }}" name="rating" value="1" />
                                    <label for="star1-{{ $seller->id }}" title="1 star"></label>
                                </div>
                            </div>

                            <div class="p-b-20">
                                <label for="comment-{{ $seller->id }}" class="stext-111 cl2 p-b-10">Comment</label>
                                <div class="bor8 how-pos4-parent">
                                    <textarea 
                                        id="comment-{{ $seller->id }}"
                                        name="comment"
                                        class="stext-111 cl2 plh3 size-120 p-lr-20 p-tb-25"
                                        placeholder="Share your experience with this seller..."
                                    ></textarea>
                                </div>
                            </div>

                            <button type="submit" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10">
                                Submit Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center stext-111 cl6 p-t-20 p-b-30">
                No sellers to rate for this order.
            </div>
        @endforelse
    </div>
</div>

<style>
    .star-rating {
        display: inline-flex;
        gap: 0.25rem;
        direction: rtl;
    }

    .star-rating > input {
        display: none;
    }

    .star-rating > label {
        color: #d1d5db;
        font-size: 2rem;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }

    .star-rating > label:before {
        content: "★";
    }

    .star-rating > input:checked ~ label,
    .star-rating > input:hover ~ label {
        color: #fbbf24;
    }
</style>
@endsection