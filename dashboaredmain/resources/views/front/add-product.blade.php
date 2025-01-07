@extends('front.master')
@section('header-class', 'header-v4')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('front.partials.profile-sidebar')

            <!-- Content Area -->
            <div class="col-sm-12 col-lg-9 m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0-sm">
                    <h4 class="mtext-109 cl2 p-b-30">Add New Product</h4>
                    <form id="productForm" action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <!-- Add Product Section -->
                        <div class="col-12 col-md-6 p-b-20">
                            <div class="bor8 how-pos4-parent file-upload-container" style="position: relative; padding: 15px;">
                                <input type="file" name="image" id="imageInput" accept="image/*" class="file-input" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; top: 0; left: 0; z-index: 2;">
                                <div class="text-center">
                                    <i class="zmdi zmdi-cloud-upload fs-30 cl1 p-b-20"></i>
                                    <div class="stext-109 cl2">Choose Primary Image</div>
                                    <p class="stext-111 cl6" id="primaryFileName">No file chosen</p>
                                    <div id="imagePreview" style="margin-top: 15px; display: none;">
                                        <img id="previewImg" src="" alt="Preview" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <!-- Additional Images Upload -->
                        <div class="col-12 col-md-6 p-b-20">
                            <div class="bor8 how-pos4-parent file-upload-container" style="position: relative; padding: 15px;">
                                <input type="file" name="additional_images[]" id="additionalImagesInput" accept="image/*" class="file-input" multiple style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; top: 0; left: 0; z-index: 2;">
                                <div class="text-center">
                                    <i class="zmdi zmdi-cloud-upload fs-30 cl1 p-b-20"></i>
                                    <div class="stext-109 cl2">Add More Images</div>
                                    <p class="stext-111 cl6" id="additionalFileNames">No files chosen</p>
                                    <div id="additionalImagesPreview" style="margin-top: 15px; display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
                                    </div>
                                </div>
                            </div>
                            @error('additional_images.*')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        
                        <div class="row">
                                <div class="col-sm-4 p-b-20">
                                    <div class="bor8 how-pos4-parent">
                                        <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                            name="name" 
                                            type="text" 
                                            placeholder="Product Name"
                                            value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Category -->
                                <div class="col-sm-4 p-b-20">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Price -->
                                <div class="col-sm-4 p-b-20">
                                    <div class="bor8 how-pos4-parent">
                                        <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                            name="price" 
                                            type="number" 
                                            placeholder="Price"
                                            value="{{ old('price') }}"
                                            step="0.01">
                                    </div>
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Description -->
                                <div class="col-12 p-b-20">
                                    <div class="bor8 how-pos4-parent">
                                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-20 p-tb-25" 
                                                name="description" 
                                                placeholder="Product description">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Size -->
                                <div class="col-sm-4 p-b-20">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="size">
                                            <option value="">Select Size</option>
                                            @foreach(['S', 'M', 'L', 'XL', '1-2 years', '2-3 years', '3-4 years', '4-5 years', 
                                                    '5-6 years', '6-7 years', '7-8 years', '8-9 years', '9-10 years', 
                                                    '10-11 years', '11-12 years', '12-13 years', '13-14 years', '14-15 years', 
                                                    '15-16 years', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45'] as $size)
                                                <option value="{{ $size }}" {{ old('size') == $size ? 'selected' : '' }}>
                                                    {{ $size }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    @error('size')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Color -->
                                <div class="col-sm-4 p-b-20">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" name="color">
                                            <option value="">Select Color</option>
                                            @foreach(['red', 'blue', 'green', 'yellow', 'black', 'white', 'purple', 'orange', 
                                                    'pink', 'brown', 'gray', 'beige', 'teal', 'cyan', 'magenta', 'indigo', 
                                                    'violet', 'maroon', 'turquoise', 'lavender', 'gold', 'silver', 'charcoal', 
                                                    'peach', 'mint', 'coral', 'seafoam', 'apricot', 'plum'] as $color)
                                                <option value="{{ $color }}" {{ old('color') == $color ? 'selected' : '' }}>
                                                    {{ ucfirst($color) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    @error('color')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <!-- Quantity -->
                                <div class="col-sm-4 p-b-20">
                                    <div class="bor8 how-pos4-parent">
                                        <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                            name="quantity" 
                                            type="number" 
                                            placeholder="Stock quantity"
                                            value="{{ old('quantity') }}"
                                            min="0">
                                    </div>
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            <div class="col-12">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10">
                                    Add Product
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('productForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json'  // Request JSON response
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                title: 'Success!',
                text: data.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("home") }}';
                }
            });
        } else {
            // Handle validation errors
            let errorMessage = '';
            if (data.errors) {
                errorMessage = Object.values(data.errors).flat().join('\n');
            } else {
                errorMessage = data.message || 'An error occurred';
            }
            
            Swal.fire({
                title: 'Error!',
                text: errorMessage,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error!',
            text: 'Something went wrong. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});
        
        // Image preview functionality
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('primaryFileName').textContent = file.name;
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Additional images preview
        document.getElementById('additionalImagesInput').addEventListener('change', function(e) {
            const files = e.target.files;
            const previewDiv = document.getElementById('additionalImagesPreview');
            previewDiv.innerHTML = '';
            
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    img.style.objectFit = 'contain';
                    previewDiv.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
            
            document.getElementById('additionalFileNames').textContent = 
                Array.from(files).map(file => file.name).join(', ');
        });
        </script>
</section>

@endsection