<head>
	<title>QuickPick | @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/png" href="{{ asset ('front-assets')}}/images/icons/favicon.png"/>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




</head>
<style>
	.zmdi-favorite {
		color: #e91e63;
	}

	.quantity-control {
    display: flex;
	justify-content: space-between;
    align-items: stretch;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    height: 40px;
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

	</style>

