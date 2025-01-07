@extends('front.master')

@section('header-class', 'header-v4')
@section('content')
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset ('front-assets') }}/images/39a746d6-ad89-4958-8a4a-6c508d7c8129.jfif');">
		<h2 class="ltext-105 cl0 txt-center">
			About Us
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Story
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Welcome to LumiPick, a platform designed to bridge the gap between Shein intermediaries and customers in our community. Our journey started with a simple goal: to provide an efficient and user-friendly marketplace where intermediaries can showcase their unsold Shein products and customers can shop locally for immediate delivery. By bringing intermediaries and buyers together, we aim to create a seamless shopping experience that is both convenient and trustworthy.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Whether you're an intermediary looking to sell your products or a customer seeking a Lumi and easy shopping experience, LumiPick is here to serve your needs. Our platform not only helps intermediaries reduce their inventory but also empowers customers by providing instant access to a variety of products, complete with detailed location-based information for smooth handovers.
						</p>

						<p class="stext-113 cl6 p-b-26">
							If you have any questions or need assistance, feel free to reach out to us. We're here to help you every step of the way!
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1">
						<div class="hov-img0">
							<img src="{{  asset ('front-assets/images/836ac844-2bb2-40a8-be31-e61459e6180b.jfif') }}" alt="About Us">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							At LumiPick, our mission is to empower local businesses and streamline the shopping experience for customers. By offering a platform that connects Shein intermediaries and local buyers, we aim to:
						</p>
						<ul class="stext-113 cl6 p-b-26">
							<li>Reduce intermediaries' inventory challenges by giving them a direct channel to sell unsold products.</li>
							<li>Provide customers with immediate access to affordable and trendy items without long shipping delays.</li>
							<li>Enhance local commerce by fostering connections within the community.</li>
						</ul>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								"Great businesses are built on relationships. At LumiPick, we believe in creating meaningful connections between sellers and buyers, making shopping more personal and efficient."
							</p>

							<span class="stext-111 cl8">
								- LumiPick Team
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{ asset('front-assets/images/be1a04da-c95e-4352-866c-4a207226eb5b.jfif') }}" alt="Our Mission">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
@endsection
