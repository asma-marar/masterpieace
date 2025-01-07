@extends('front.master')
@section('header-class', 'header-v4')
@section('content')
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('front.partials.profile-sidebar')
            <!-- Content Area -->
            <div class="col-sm-12 col-lg-9 m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0-sm">
                    <!-- Profile Section -->
                    <div id="profile-section">
                        <h4 class="mtext-109 cl2 p-b-30">Profile Details</h4>
                        
                        <!-- View Mode -->
                        <div id="profile-view" class="row">
                            <div class="col-12 text-center m-b-30">
                                <div class="hov-img0 pos-relative">
                                    <img src="{{ $customer->profile_image ? asset('uploads/profile/' . $customer->profile_image) : asset('front-assets/images/default-profile.jpg') }}" alt="Profile" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- Profile details here -->
                                <div class="p-b-20">
                                    <h6 class="stext-109 cl2">Full Name</h6>
                                    <p class="stext-115 cl6">{{ $customer->name }}</p>
                                </div>
                                <div class="p-b-20">
                                    <h6 class="stext-109 cl2">Email</h6>
                                    <p class="stext-115 cl6">{{ $customer->email }}</p>
                                </div>

                                <div class="p-b-20">
                                    <h6 class="stext-109 cl2">Phone Number</h6>
                                    <p class="stext-115 cl6">{{ $customer->phone ?? 'N/A' }}</p>
                                </div>

                                <div class="p-b-20">
                                    <h6 class="stext-109 cl2">Address</h6>
                                    <p class="stext-115 cl6">{{ $customer->address ?? 'N/A' }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 p-b-20">
                                        <h6 class="stext-109 cl2">City</h6>
                                        <p class="stext-115 cl6">{{ $customer->city ?? 'N/A' }}</p>
                                    </div>

                                <div class="col-12">
                                <button 
                                    type="button" 
                                    class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editProfileModal">
                                    Edit Profile
                                </button>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Mode -->

                <!-- Bootstrap Modal -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Edit Form -->
                                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-12 text-center m-b-30">
                                            <div class="hov-img0 pos-relative">
                                                <img 
                                                    src="{{ $customer->profile_image ? asset('uploads/profile/' . $customer->profile_image) : asset('front-assets/images/default-profile.jpg') }}" 
                                                    alt="Profile" 
                                                    class="rounded-circle" 
                                                    style="width: 120px; height: 120px; object-fit: cover;">
                                                <input 
                                                    type="file" 
                                                    name="profile_image" 
                                                    class="form-control mt-3" 
                                                    accept="image/*">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-b-20">
                                            <div class="bor8 how-pos4-parent">
                                                <input 
                                                    class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                                    type="text" 
                                                    name="name" 
                                                    value="{{ $customer->name }}" 
                                                    placeholder="Full Name">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-b-20">
                                            <div class="bor8 how-pos4-parent">
                                                <input 
                                                    class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                                    type="email" 
                                                    name="email" 
                                                    value="{{ $customer->email }}" 
                                                    placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-b-20">
                                            <div class="bor8 how-pos4-parent">
                                                <input 
                                                    class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                                    type="tel" 
                                                    name="phone_number" 
                                                    value="{{ $customer->phone }}" 
                                                    placeholder="Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-12 p-b-20">
                                            <div class="bor8 how-pos4-parent">
                                                <textarea 
                                                    class="stext-111 cl2 plh3 size-120 p-lr-20 p-tb-25" 
                                                    name="address" 
                                                    placeholder="Address">{{ $customer->address }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-b-20">
                                            <div class="bor8 how-pos4-parent">
                                                <input 
                                                    class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                                    type="text" 
                                                    name="city" 
                                                    value="{{ $customer->city }}" 
                                                    placeholder="City">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                            Save Changes
                                        </button>
                                        <button type="button" class="flex-c-m stext-101 cl0 size-112 bg3 bor1 hov-btn3 p-lr-15 trans-04" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection