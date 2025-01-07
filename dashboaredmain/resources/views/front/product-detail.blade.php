@extends('front.master')

@section('header-class', 'header-v4')
@section('title' , 'Detail')

@section('content')
	<!-- breadcrumb -->
	{{-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				{{ $detail->category->name }}

				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				{{ $detail->name }}
			</span>
		</div>
	</div>
		 --}}

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			        <!-- Page Title on the Left -->
					<div class="p-b-45">
						<h3 class="ltext-106 cl5 txt-center">
							Order Detail
						</h3>
					</div>
			<div class="row">
				<!-- Product Images -->
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
	
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{ asset($detail->image) }}" style="object-fit: cover;">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset($detail->image) }}" alt="IMG-PRODUCT" style="width: 100%; height: 600px; object-fit: cover;">
									</div>
								</div>
								@foreach ($detail->productImages as $image)
								<div class="item-slick3" data-thumb="{{ asset($image->image_path) }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset($image->image_path) }}" alt="IMG-PRODUCT" style="width: 100%; height: 600px; object-fit: cover;">
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
	
				<!-- Product Details -->
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<!-- Product Name and Price -->
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $detail->name }}
						</h4>
						<span class="mtext-106 cl2">
							${{ $detail->price }}
						</span>
	
						<!-- Product Details with Titles -->
						<div class="p-t-23">
							<h5 class="stext-102 cl4">Description:</h5>
							<p class="stext-102 cl3">
								{{ $detail->description }}
							</p>
						</div>
						<div class="p-t-23">
							<h5 class="stext-102 cl4">Size:</h5>
							<p class="stext-102 cl3">
								{{ $detail->size }}
							</p>
						</div>
						<div class="p-t-23">
							<h5 class="stext-102 cl4">Color:</h5>
							<p class="stext-102 cl3">
								{{ $detail->color }}
							</p>
						</div>
	
						<!-- Quantity, Wishlist, and Add to Cart -->
						<div class="p-t-33">
							<div class="flex-w flex-m align-items-center">
								<!-- Quantity Control -->

								<button type="button" class="cart-toggle flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04" data-product-id="{{ $detail->id }}">
									Add to Cart
								</button>
								<!-- Wishlist Button -->
								<a href="javascript:void(0)" class="wishlist-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 m-l-20" data-product-id="{{ $detail->id }}">
									@if(Auth::guard('customer')->check() && $detail->wishlists()->where('customer_id', Auth::guard('customer')->id())->exists())
										<i class="zmdi zmdi-favorite text-danger"></i>
									@else
										<i class="zmdi zmdi-favorite-outline"></i>
									@endif
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>
	
			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach ($relatedProducts as $product)
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0" style="height: 300px; overflow: hidden;">
									<a href="{{ route('user.detail', ['id' => $product->id]) }}">									
									<img src="{{ asset($product->image) }}" 
										alt="IMG-PRODUCT"
										style="width: 100%; height: 100%; object-fit: cover;">
									</a>
								</div>
	
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<a href="{{ route('user.detail', $product->id) }}" 
										class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											{{ $product->name }}
										</a>
	
										<span class="stext-105 cl3">
											${{ number_format($product->price, 2) }}
										</span>
									</div>
	
									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="javascript:void(0)" class="wishlist-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $product->id }}">
											@if(Auth::guard('customer')->check() && $product->wishlists()->where('customer_id', Auth::guard('customer')->id())->exists())
												<i class="zmdi zmdi-favorite text-danger"></i>
											@else
												<i class="zmdi zmdi-favorite-outline"></i>
											@endif
										</a>
		
										<a href="javascript:void(0)" class="cart-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $product->id }}">
											@if(Auth::guard('customer')->check() && $product->cartItems()->whereHas('cart', function($q) {
												$q->where('customer_id', Auth::guard('customer')->id());
											})->exists())
												<i class="zmdi zmdi-shopping-cart text-primary"></i>
											@else
												<i class="zmdi zmdi-shopping-cart-plus"></i>
											@endif
										</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

@endsection