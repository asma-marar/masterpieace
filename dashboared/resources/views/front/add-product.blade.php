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
                    <h4 class="mtext-109 cl2 p-b-30">Add New Product</h4>
                    <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <!-- Add Product Section -->
                        <div class="col-12 p-b-20">
                            <div class="bor8 how-pos4-parent file-upload-container" style="position: relative; padding: 15px;">
                                <input type="file" name="image" id="imageInput" accept="image/*" class="file-input" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; top: 0; left: 0; z-index: 2;">
                                <div class="text-center">
                                    <i class="zmdi zmdi-cloud-upload fs-30 cl1 p-b-20"></i>
                                    <div class="stext-109 cl2">Choose Image</div>
                                    <p class="stext-111 cl6 selected-file-name">No file chosen</p>
                                    <!-- Image preview container -->
                                    <div id="imagePreview" style="margin-top: 15px; display: none;">
                                        <img id="previewImg" src="" alt="Preview" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        

                            <div class="col-sm-4 p-b-20">
                                <div class="bor8 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="name" type="text" placeholder="Product Name">
                                </div>
                            </div>

                            <div class="col-sm-4 p-b-20">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="category_id">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <div class="col-sm-4 p-b-20">
                                <div class="bor8 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="price" type="number" placeholder="Price">
                                </div>
                            </div>

                            <div class="col-12 p-b-20">
                                <div class="bor8 how-pos4-parent">
                                    <textarea class="stext-111 cl2 plh3 size-120 p-lr-20 p-tb-25" name="description" placeholder="Product description"></textarea>
                                </div>
                            </div>


                            <div class="col-sm-4 p-b-20">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="size">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <div class="col-sm-4 p-b-20">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="color">
                                        <option value="red">Red</option>
                                        <option value="blue">Blue</option>
                                        <option value="green">Green</option>
                                        <option value="yellow">Yellow</option>
                                        <option value="black">Black</option>
                                        <option value="white">White</option>
                                        <option value="purple">Purple</option>
                                        <option value="orange">Orange</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                            

                            <div class="col-sm-4 p-b-20">
                                <div class="bor8 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="quantity" type="number" placeholder="Stock quantity">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection