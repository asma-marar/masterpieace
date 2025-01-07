@extends('front.master')

@section('header-class', 'header-v4')
@section('title' , 'Products')

@section('content')
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Our Product
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ !request('category_id') ? 'how-active1' : '' }}" 
                    onclick="window.location='{{ route('products') }}'">
                    All Products
                </button>

                @foreach ($categoriesAll as $category)
                    <button 
                        class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request('category_id') == $category->id ? 'how-active1' : '' }}"
                        onclick="window.location='{{ route('products', ['category_id' => $category->id]) }}'">
                        {{ $category->name }}
                    </button>
                @endforeach
					
				
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="dropdown">

							<button class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 dropdown-toggle" 
							type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
							Sort
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<!-- Preserve existing filters -->
							<li>
								<a class="dropdown-item" href="{{ url()->current() }}?price_sort=low_to_high&category_id={{ request('category_id') }}&search-product={{ request('search-product') }}">
									Price: Low to High
								</a>
							</li>
							<li>
								<a class="dropdown-item" href="{{ url()->current() }}?price_sort=high_to_low&category_id={{ request('category_id') }}&search-product={{ request('search-product') }}">
									Price: High to Low
								</a>
							</li>
						</ul>
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="search-bar-wrapper">
						<form action="{{ route('products') }}" method="GET" class="search-bar-form">
							<button class="search-bar-button">
								<i class="zmdi zmdi-search"></i>
							</button>
							<input class="search-bar-input" type="text" name="search-product" placeholder="Search" value="{{ request('search-product') }}">
							<input type="hidden" name="category_id" value="{{ request('category_id') }}">
						</form>
					</div>
				</div>


			</div>
			@if($products->isEmpty())
			<p>No products found for this category.</p>
		    @else
			<div class="row isotope-grid">
				@foreach ($products as $product)
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
						<div class="block2">
							<div class="block2-pic hov-img0">
								<a href="{{ route('user.detail', ['id' => $product->id]) }}">
									<img src="{{ asset($product->image) }}" alt="IMG-PRODUCT" style="width: 100%; height: 300px; object-fit: cover;">
								</a>
							</div>
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
									<a href="{{ route('user.detail', ['id' => $product->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $product->name }}
									</a>
									<a href="{{ route('user.customer.profile', ['id' => $product->customer->id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $product->customer->name }}
									</a>
									<span class="stext-105 cl3">
										${{ $product->price }}
									</span>
								</div>
								<div class="block2-txt-child2 flex-r p-t-3">
									@if(Auth::guard('customer')->check())
										@if(Auth::guard('customer')->id() != $product->customer_id)  {{-- Check if logged customer is not the product owner --}}
											<a href="javascript:void(0)" class="wishlist-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $product->id }}">
												@if($product->wishlists()->where('customer_id', Auth::guard('customer')->id())->exists())
													<i class="zmdi zmdi-favorite text-danger"></i>
												@else
													<i class="zmdi zmdi-favorite-outline"></i>
												@endif
											</a>
									
											<a href="javascript:void(0)" class="cart-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $product->id }}">
												@if($product->cartItems()->whereHas('cart', function($q) {
													$q->where('customer_id', Auth::guard('customer')->id());
												})->exists())
													<i class="zmdi zmdi-shopping-cart text-primary"></i>
												@else
													<i class="zmdi zmdi-shopping-cart-plus"></i>
												@endif
											</a>
										@endif
									@else
										{{-- Show buttons for non-logged in users --}}
										<a href="javascript:void(0)" class="wishlist-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $product->id }}">
											<i class="zmdi zmdi-favorite-outline"></i>
										</a>
								
										<a href="javascript:void(0)" class="cart-toggle dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-product-id="{{ $product->id }}">
											<i class="zmdi zmdi-shopping-cart-plus"></i>
										</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endif
		<!-- Pagination -->
		<div class="pagination-container">
			{{ $products->appends(request()->except('page'))->links('front.partials.custom') }}
		</div>
	</div>
	</section>


@endsection