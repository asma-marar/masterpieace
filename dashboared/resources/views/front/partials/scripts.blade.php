<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset ('front-assets')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset ('front-assets')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/slick/slick.min.js"></script>
	<script src="{{ asset ('front-assets')}}/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset ('front-assets')}}/js/main.js"></script>

	<script>
		$(document).ready(function() {
			// When a filter button is clicked
			$('.filter-tope-group button').click(function() {
				var filterValue = $(this).attr('data-filter'); // Get the filter category
				// Apply the active class to the clicked button
				$('.filter-tope-group button').removeClass('how-active1');
				$(this).addClass('how-active1');
		
				// If the 'All Products' button is clicked, show all products
				if (filterValue === '*') {
					$('.isotope-item').show();
				} else {
					// Show only the products that belong to the clicked category
					$('.isotope-item').hide();
					$(filterValue).show();
				}
			});
		});
	</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


 {{-- tO Show the image we have in upload image  --}}
 {{-- // Replace your current image preview script with this: --}}
<script>
$(document).ready(function() {
    $('#imageInput').on('change', function(e) {
        const $fileNameDisplay = $('.selected-file-name');
        const $imagePreview = $('#imagePreview');
        const $previewImg = $('#previewImg');
        
        if (this.files && this.files[0]) {
            $fileNameDisplay.text(this.files[0].name);
            
            const reader = new FileReader();
            reader.onload = function(e) {
                $previewImg.attr('src', e.target.result);
                $imagePreview.show();
            }
            reader.readAsDataURL(this.files[0]);
        } else {
            $fileNameDisplay.text('No file chosen');
            $imagePreview.hide();
            $previewImg.attr('src', '');
        }
    });
});
    </script>

	{{-- add to wishlist --}}
	<script>
// Wishlist Script
document.addEventListener('DOMContentLoaded', function() {
    function updateWishlistCount(count) {
        // Only update wishlist notification badge
        $('[data-wishlist-count]').attr('data-notify', count);
    }

    $('.wishlist-toggle').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var $icon = $this.find('i');
        var productId = $this.data('product-id');
        
        $.ajax({
            url: "{{ route('user.wishlist.add') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                product_id: productId
            },
            success: function(response) {
                if (response.status === 'added') {
                    $icon.removeClass('zmdi-favorite-outline').addClass('zmdi-favorite text-danger');
                    updateWishlistCount(response.count);
                } else if (response.status === 'removed') {
                    $icon.removeClass('zmdi-favorite text-danger').addClass('zmdi-favorite-outline');
                    updateWishlistCount(response.count);
                }
            },
			error: function(xhr) {
    if (xhr.status === 401) {
        Swal.fire({
            title: 'Please Login',
            text: 'You need to be logged in to add items to cart',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login Now',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('user.login') }}";
            }
        });
    } else if (xhr.status === 403) {
        Swal.fire({
            title: 'Error',
            text: 'You cannot add your own product to cart',
            icon: 'error'
        });
    } else {
        Swal.fire({
            title: 'Error',
            text: 'An error occurred',
            icon: 'error'
        });
    }
}
        });
    });
});
	</script>
	

	


{{-- all cart scripts --}}
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const quantityControls = document.querySelectorAll('.quantity-control');
		
		quantityControls.forEach(control => {
			const minusBtn = control.querySelector('.minus');
			const plusBtn = control.querySelector('.plus');
			const input = control.querySelector('.qty-input');
			const maxQuantity = parseInt(input.dataset.max);
			
			minusBtn.addEventListener('click', function(e) {
				e.preventDefault();
				const currentValue = parseInt(input.value);
				if (currentValue > 1) {
					input.value = currentValue - 1;
					updateCartItem(input);
				}
			});
			
			plusBtn.addEventListener('click', function(e) {
				e.preventDefault();
				const currentValue = parseInt(input.value);
				if (currentValue < maxQuantity) {
					input.value = currentValue + 1;
					updateCartItem(input);
				}
			});
			
			updateButtonStates(control);
		});
		
		function updateButtonStates(control) {
			const input = control.querySelector('.qty-input');
			const minusBtn = control.querySelector('.minus');
			const plusBtn = control.querySelector('.plus');
			const currentValue = parseInt(input.value);
			const maxQuantity = parseInt(input.dataset.max);
			
			minusBtn.disabled = currentValue <= 1;
			minusBtn.classList.toggle('opacity-50', currentValue <= 1);
			minusBtn.classList.toggle('cursor-not-allowed', currentValue <= 1);
			
			plusBtn.disabled = currentValue >= maxQuantity;
			plusBtn.classList.toggle('opacity-50', currentValue >= maxQuantity);
			plusBtn.classList.toggle('cursor-not-allowed', currentValue >= maxQuantity);
		}
		
		function updateCartItem(input) {
			const control = input.closest('.quantity-control');
			updateButtonStates(control);
			
			const itemId = input.name.match(/\d+/)[0];
			const quantity = parseInt(input.value);
			const row = input.closest('.table_row');
			const priceElement = row.querySelector('.column-3');
			const totalElement = row.querySelector('.column-5');
			
			const price = parseFloat(priceElement.textContent.replace('$', ''));
			const itemTotal = price * quantity;
			totalElement.textContent = `$${itemTotal.toFixed(2)}`;
			
			updateCartTotals();
			
			fetch('/user/cart/update-quantity', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				body: JSON.stringify({
					item_id: itemId,
					quantity: quantity
				})
			})
			.then(response => response.json())
			.then(data => {
				if (!data.success) {
					alert('Error updating quantity');
				}
			})
			.catch(error => {
				console.error('Error:', error);
				alert('Error updating quantity');
			});
		}
		
		function updateCartTotals() {
			let subtotal = 0;
			document.querySelectorAll('.table_row').forEach(row => {
				const totalText = row.querySelector('.column-5').textContent;
				subtotal += parseFloat(totalText.replace('$', ''));
			});
			
			const subtotalElement = document.querySelector('.bor12 .size-209 .mtext-110');
			subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
			
			const shippingCost = 3;
			const total = subtotal + shippingCost;
			const totalElement = document.querySelector('.p-t-27 .size-209 .mtext-110');
			totalElement.textContent = `$${total.toFixed(2)}`;
		}
	});
		</script>

{{-- the script related tothe icon and add to cart button --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateCartCount(count) {
        $('.icon-header-noti[href$="cart"]').attr('data-notify', count);
    }

    function updateButtonState($button, isInCart) {
        if (isInCart) {
            $button.text('Remove from Cart');
            $button.removeClass('bg1').addClass('bg-danger');
        } else {
            $button.text('Add to Cart');
            $button.removeClass('bg-danger').addClass('bg1');
        }
    }

    function handleCartToggle($element, isButton = false) {
        $.ajax({
            url: "{{ route('user.cart.add') }}",
            type: 'POST',
            data: {
                product_id: $element.data('product-id'),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'added') {
                    if (isButton) {
                        updateButtonState($element, true);
                    } else {
                        $element.find('i')
                            .removeClass('zmdi-shopping-cart-plus')
                            .addClass('zmdi-shopping-cart text-primary');
                    }
                } else {
                    if (isButton) {
                        updateButtonState($element, false);
                    } else {
                        $element.find('i')
                            .removeClass('zmdi-shopping-cart text-primary')
                            .addClass('zmdi-shopping-cart-plus');
                    }
                }
                updateCartCount(response.cartCount);
            },
            error: function(xhr) {
    if (xhr.status === 401) {
        Swal.fire({
            title: 'Please Login',
            text: 'You need to be logged in to add items to cart',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login Now',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('user.login') }}";
            }
        });
    } else if (xhr.status === 403) {
        Swal.fire({
            title: 'Error',
            text: 'You cannot add your own product to cart',
            icon: 'error'
        });
    } else {
        Swal.fire({
            title: 'Error',
            text: 'An error occurred',
            icon: 'error'
        });
    }
}
        });
    }

    $('.cart-toggle.size-112').on('click', function(e) {
        e.preventDefault();
        handleCartToggle($(this), true);
    });

    $('.cart-toggle.icon-header-item').on('click', function(e) {
        e.preventDefault();
        handleCartToggle($(this), false);
    });

    function checkCartState() {
        $('.cart-toggle.size-112').each(function() {
            var $button = $(this);
            var productId = $button.data('product-id');
            
            $.ajax({
                url: "{{ route('user.cart.check') }}",
                type: 'GET',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    updateButtonState($button, response.inCart);
                }
            });
        });
    }

    checkCartState();
});
		</script>

{{-- script for the navbar --}}
<script>
	document.querySelectorAll('.main-menu li a').forEach(link => {
  link.addEventListener('click', function(e) {
    // Remove active class from all items
    document.querySelector('.active-menu')?.classList.remove('active-menu');
    
    // Add active class to clicked item's parent li
    this.parentElement.classList.add('active-menu');
  });
});
</script>
	

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>






