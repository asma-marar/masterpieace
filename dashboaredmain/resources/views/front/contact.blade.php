@extends('front.master')

@section('header-class', 'header-v4')
@section('title', 'Contact')

@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('front-assets') }}/images/438276d6-6820-47a6-981a-9447f9fe3ffd.jfif');">
    <h2 class="ltext-105 cl0 txt-center">
        Contact
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <form method="POST" action="{{ route('user.contact.store') }}">
                @csrf
                <h4 class="mtext-105 cl2 txt-center p-b-30">
                    Send Us A Message
                </h4>

                <!-- Email Field -->
                <div class="bor8 m-b-20 how-pos4-parent">
                    <input 
                        class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" 
                        type="email" 
                        name="email" 
                        value="{{ auth('customer')->check() ? auth('customer')->user()->email : '' }}" 
                        placeholder="Your Email Address" 
                        required>
                    <img class="how-pos4 pointer-none" src="{{ asset('front-assets/images/icons/icon-email.png') }}" alt="ICON">
                </div>

                <!-- Message Field -->
                <div class="bor8 m-b-30">
                    <textarea 
                        class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" 
                        name="message" 
                        placeholder="How Can We Help?" 
                        required></textarea>
                </div>

                <!-- Submit Button -->
                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Submit
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
