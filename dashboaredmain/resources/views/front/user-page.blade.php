@extends('front.master')
@section('header-class', 'header-v4')

@section('content')
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- User Profile Section -->
                <div class="user-profile border p-3">
                    <div class="text-center">
                        <img src="{{ $customer->profile_image ? asset('uploads/profile/' . $customer->profile_image) : asset('front-assets/images/default-profile.jpg') }}" alt="User Image" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h4 class="mtext-109 cl2 p-t-20">{{ $customer->name }}</h4>
                    <p class="stext-104 cl6">Email: {{ $customer->email }}</p>
                    <p class="stext-104 cl6">Phone: {{ $customer->phone }}</p>
                    <p class="stext-104 cl6">Address: {{ $customer->address }}</p>
                    <p class="stext-104 cl6">City: {{ $customer->city }}</p>

                    <!-- User Rating Section with Border -->
                    <div class="user-rating p-t-20 border-top pt-3">
                        <h5>Rating</h5>
                        <div class="stars">
                            @php
                                $averageRating = $customer->ratings->avg('rating'); // Calculate average rating
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $averageRating)
                                    <i class="zmdi zmdi-star"></i>
                                @else
                                    <i class="zmdi zmdi-star-outline"></i>
                                @endif
                            @endfor
                            <span class="ml-2">({{ number_format($averageRating, 1) }} / 5)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- User's Products Section with Border -->
                <div class="user-products border p-3">
                    <h4 class="mtext-109 cl2 p-t-20">Products by {{ $customer->name }}</h4>
                    <div class="row isotope-grid">
                        @foreach ($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <a href="{{ route('user.detail', ['id' => $product->id]) }}">
                                            <img src="{{ asset($product->image) }}" alt="IMG-PRODUCT" class="img-fluid" style="height: 300px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l">
                                            <a href="{{ route('user.detail', ['id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                {{ $product->name }}
                                            </a>
                                            <span class="stext-105 cl3">
                                                ${{ $product->price }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                
                    <!-- Pagination -->
                    <div class="pagination-container">
                        {{ $products->links('front.partials.custom') }}
                    </div>
                </div>

            <!-- User Comments Section with Border -->
            <div class="user-comments border p-3 mt-3">
                <h4 class="mtext-109 cl2 p-b-20">Comments</h4>
                <div class="scrollable-comments">
                    @foreach ($customer->ratings as $rating)
                        <div class="comment mb-3">
                            <p><strong>Rated by: {{ $rating->customer->name }}</strong></p>
                            <p><strong>Rating:</strong> 
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating->rating)
                                        <i class="zmdi zmdi-star"></i>
                                    @else
                                        <i class="zmdi zmdi-star-outline"></i>
                                    @endif
                                @endfor
                            </p>
                            <p><strong>Comment:</strong> {{ $rating->comment }}</p>
                            <hr class="mt-2">
                        </div>
                    @endforeach

                    @if ($customer->ratings->isEmpty())
                        <p>No comments yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
