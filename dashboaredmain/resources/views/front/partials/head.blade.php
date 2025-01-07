<head>
	<title>LumiPick | @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="{{ asset ('front-assets')}}/images/icons/favicon-32x32.png"/>
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/MagnificPopup/magnific-popup.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset ('front-assets')}}/css/main.css">

	<!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">





</head>
<style>
	.zmdi-favorite {
		color: #e91e63;
	}

	.quantity-control {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    height: 35px;
    width: 96px;
}

.qty-btn {
    padding: 0 12px;
    background: #f8f9fa;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.qty-btn:hover:not(:disabled) {
    background: #e9ecef;
}

.qty-btn:disabled {
    cursor: not-allowed;
    opacity: 0.5;
}

.qty-input {
    width: 50px;
    text-align: center;
    border: none;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    margin: 0;
    padding: 0;
    height: 100%;
}

.qty-input:focus {
    outline: none;
}
	
.zmdi-check-circle {
    font-size: 5rem;
    color: #4CAF50;
}

/* .text-danger {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    } */

    /* for images related in product-detail */
    .block2-pic {
    height: 300px;
    overflow: hidden;

    
}

.block2-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Adjust product image size to take up more width within col-md-8 */
.product-image {
    height: 350px;  /* Set a fixed height for uniformity */
    width: 100%;    /* Make the image width 100% of the parent */
    object-fit: cover;  /* Ensure the image covers the full width without distortion */
}

/* Adjust padding/margins to give more space between items */
.isotope-item {
    margin-bottom: 35px;  /* Space between product blocks */
}

/* Optionally, increase the spacing between the product section items */
.user-products {
    padding: 30px;  /* Adjust padding as needed */
}

/* Make the user profile section more compact */
.user-profile {
    padding: 15px;
}

/* Adjust the row for products to allow more width for images */
.isotope-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
/* style for drop down list in sort page */
.dropdown-menu {
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    font-size: 14px;
    padding: 10px 20px;
    color: #333;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.dropdown-item:hover {
    background-color: #f3f3f3;
    color: #000;
}
/* search style */
/* Wrapper for search bar */
.search-bar-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: 10px 0;
}

/* Form styles */
.search-bar-form {
    display: flex;
    align-items: center;
    border: 2px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff;
    width: 100%;
    max-width: 400px;
}

/* Search button */
.search-bar-button {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background-color: transparent;
    border: none;
    cursor: pointer;
    color: #333;
}

.search-bar-button:hover {
    color: #007bff; /* Add hover color if desired */
}

/* Search input */
.search-bar-input {
    flex: 1;
    padding: 10px 15px;
    border: none;
    outline: none;
    font-size: 16px;
    color: #333;
}

.search-bar-input::placeholder {
    color: #aaa;
}
.cart-toggle {
    transition: all 0.3s ease;
}

.cart-toggle.bg-danger {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}

.cart-toggle.bg-danger:hover {
    opacity: 0.9;
}

/* Maintain your existing hover styles */
.cart-toggle.bg1:hover {
    background-color: #222 !important;
}

/* Star color modification */
.zmdi-star {
    color: #FFD700; /* This is a golden yellow color */
}

/* Scrollable comments section */
.scrollable-comments {
    max-height: 400px; /* You can adjust this height */
    overflow-y: auto;
    padding-right: 10px;
}

/* Custom scrollbar styling */
.scrollable-comments::-webkit-scrollbar {
    width: 6px;
}

.scrollable-comments::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.scrollable-comments::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

.scrollable-comments::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Add text-shadow to slider headings and subtitles */
.layer-slick1 span, 
.layer-slick1 h2 {
    text-shadow: 6px 6px 14px rgba(79, 48, 76, 0.7);
    color: #fff; /* Ensure the text color contrasts with the background */
 } 

/* .layer-slick1 h2 {
    text-shadow: 4px 4px 10px rgba(250, 245, 250, 0.7);
    color: #5c3b6d;} /* Ensure the text color contrasts with the background  */


    .section-slide {
    min-height: 100vh;
    margin-bottom: 0;
}

.wrap-slick1, 
.slick1, 
.item-slick1 {
    height: 100vh !important;
}

.container.h-full {
    height: 100%;
}

.flex-col-l-m {
    padding-top: 0 !important;
    justify-content: center;
    height: 100%;
}
</style>

