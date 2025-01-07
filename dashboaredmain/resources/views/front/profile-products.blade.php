@extends('front.master')
@section('header-class', 'header-v4')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            @include('front.partials.profile-sidebar')

            <!-- Products List -->
            <div class="col-sm-12 col-lg-9">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0-sm">
                    <div class="row">
                        @if($products->isEmpty())
                            <div class="col-12 text-center p-t-50 p-b-50">
                                <div class="how-pos4-parent">
                                    <!-- Empty state illustration or icon -->
                                    <i class="zmdi zmdi-shopping-cart fs-50 cl1 m-b-30"></i>
                                    
                                    <h4 class="mtext-109 cl2 p-b-15">No Products Yet</h4>
                                    <p class="stext-111 cl6 p-b-25">You haven't added any products to your store.</p>
                                    
                                    <!-- Add Product Button -->
                                    <a href="{{ route('user.profile.add') }}" 
                                       class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10">
                                        Add Your First Product
                                    </a>
                                </div>
                            </div>
                        @else
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-lg-4 p-b-35">
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{{ asset($product->image) }}" alt="IMG-PRODUCT" style="width: 100%; height: 300px; object-fit: cover;">
                                            <button type="button" 
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
                                            onclick="editProduct({{ $product->id }})">
                                                Edit Product
                                            </button>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l">
                                                <span class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $product->name }}
                                                </span>
                                                <span class="stext-105 cl3">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                </div>
            <!-- Pagination -->
			<div class="pagination-container">
				{{ $products->links('front.partials.custom') }}
			</div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <!-- Primary Image -->
                        <div class="col-12 col-md-6 p-b-20">
                            <div class="bor8 how-pos4-parent file-upload-container" style="position: relative; padding: 15px;">
                                <input type="file" name="image" id="editImageInput" accept="image/*" class="file-input" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; top: 0; left: 0; z-index: 2;">
                                <div class="text-center">
                                    <i class="zmdi zmdi-cloud-upload fs-30 cl1 p-b-20"></i>
                                    <div class="stext-109 cl2">Primary Image</div>
                                    <div id="editImagePreview" style="margin-top: 15px;">
                                        <img id="editPreviewImg" src="" alt="Preview" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Images -->
                        <div class="col-12 col-md-6 p-b-20">
                            <div class="bor8 how-pos4-parent file-upload-container" style="position: relative; padding: 15px;">
                                <input type="file" name="additional_images[]" id="editAdditionalImagesInput" accept="image/*" class="file-input" multiple style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer; top: 0; left: 0; z-index: 2;">
                                <div class="text-center">
                                    <i class="zmdi zmdi-cloud-upload fs-30 cl1 p-b-20"></i>
                                    <div class="stext-109 cl2">Additional Images</div>
                                    <div id="editAdditionalImagesPreview" style="margin-top: 15px; display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="col-sm-4 p-b-20">
                            <div class="bor8 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                    name="name" 
                                    id="editName"
                                    type="text" 
                                    placeholder="Product Name">
                            </div>
                        </div>

                        <div class="col-sm-4 p-b-20">
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                        name="category_id" 
                                        id="editCategory">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>

                        <div class="col-sm-4 p-b-20">
                            <div class="bor8 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                    name="price" 
                                    id="editPrice"
                                    type="number" 
                                    placeholder="Price"
                                    step="0.01">
                            </div>
                        </div>

                        <div class="col-12 p-b-20">
                            <div class="bor8 how-pos4-parent">
                                <textarea class="stext-111 cl2 plh3 size-120 p-lr-20 p-tb-25" 
                                    name="description" 
                                    id="editDescription"
                                    placeholder="Product description"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-4 p-b-20">
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                        name="size" 
                                        id="editSize">
                                    <option value="">Select Size</option>
                                    @foreach(['S', 'M', 'L', 'XL', '1-2 years', '2-3 years', '3-4 years', '4-5 years', 
                                            '5-6 years', '6-7 years', '7-8 years', '8-9 years', '9-10 years', 
                                            '10-11 years', '11-12 years', '12-13 years', '13-14 years', '14-15 years', 
                                            '15-16 years', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45'] as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>

                        <div class="col-sm-4 p-b-20">
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2 stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                        name="color" 
                                        id="editColor">
                                    <option value="">Select Color</option>
                                    @foreach(['red', 'blue', 'green', 'yellow', 'black', 'white', 'purple', 'orange', 
                                            'pink', 'brown', 'gray', 'beige', 'teal', 'cyan', 'magenta', 'indigo', 
                                            'violet', 'maroon', 'turquoise', 'lavender', 'gold', 'silver', 'charcoal', 
                                            'peach', 'mint', 'coral', 'seafoam', 'apricot', 'plum'] as $color)
                                        <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>

                        <div class="col-sm-4 p-b-20">
                            <div class="bor8 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" 
                                    name="quantity" 
                                    id="editQuantity"
                                    type="number" 
                                    placeholder="Stock quantity"
                                    min="0">
                            </div>
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

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function editProduct(productId) {
    console.log('Editing product:', productId);
    $.ajax({
        url: `/user/profile/products/${productId}/edit`,
        method: 'GET',
        success: function(response) {
            if (response.success) {
                const product = response.product;
                
                // Fill the form with product data
                $('#editProductForm').attr('action', `/user/profile/products/${productId}`);
                $('#editName').val(product.name);
                $('#editCategory').val(product.category_id);
                $('#editPrice').val(product.price);
                $('#editQuantity').val(product.quantity);
                $('#editDescription').val(product.description);
                $('#editSize').val(product.size);
                $('#editColor').val(product.color);
                
                // Show current primary image
                if (product.image) {
                    $('#editPreviewImg').attr('src', `/${product.image}`);
                    $('#editImagePreview').show();
                } else {
                    $('#editImagePreview').hide();
                }
                
                // Show current additional images
                const additionalImagesPreview = $('#editAdditionalImagesPreview');
                additionalImagesPreview.empty();
                
                if (response.additionalImages && response.additionalImages.length > 0) {
                    response.additionalImages.forEach(image => {
                        additionalImagesPreview.append(`
                            <div class="preview-image-container">
                                <img src="/${image.image_path}" alt="Additional Image" 
                                     style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                        `);
                    });
                }
                
                // Reinitialize select2 dropdowns if you're using them
                $('.js-select2').select2();
                
                // Show the modal
                $('#editProductModal').modal('show');
            }
        },
        error: function(xhr) {
            alert('Error fetching product details');
        }
    });
}

// Handle image preview for primary image
$('#editImageInput').change(function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            $('#editPreviewImg').attr('src', e.target.result);
            $('#editImagePreview').show();
        }
        reader.readAsDataURL(file);
    }
});

// Handle preview for additional images
$('#editAdditionalImagesInput').change(function() {
    const files = this.files;
    const preview = $('#editAdditionalImagesPreview');
    preview.empty();
    
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.append(`
                <div class="preview-image-container">
                    <img src="${e.target.result}" alt="Additional Image Preview" 
                         style="width: 80px; height: 80px; object-fit: cover;">
                </div>
            `);
        }
        reader.readAsDataURL(files[i]);
    }
});

// Handle form submission
$('#editProductForm').on('submit', function(e) {
    e.preventDefault();
    
    const form = $(this);
    const formData = new FormData(this);
    
    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                alert('Product updated successfully');
                $('#editProductModal').modal('hide');
                location.reload(); // Reload to see changes
            }
        },
        error: function(xhr) {
            const errors = xhr.responseJSON.errors;
            let errorMessage = '';
            for (let field in errors) {
                errorMessage += errors[field].join('\n') + '\n';
            }
            alert(errorMessage || 'Error updating product');
        }
    });
});
    </script>
</section>

@endsection