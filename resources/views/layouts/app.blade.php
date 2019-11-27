<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('landing/images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/fonts/themify/themify-icons.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/fonts/elegant-font/html-css/style.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/lightbox2/css/lightbox.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('landing/vendor/noui/nouislider.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('landing/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('landing/css/main.css')}}">
	@yield('css')
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	@include('shared.header')

	@yield('content')
	@include('shared.footer')



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/bootstrap/js/popper.js')}}"></script>
	<script type="text/javascript" src="{{asset('landing/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/select2/select2.min.js')}}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/slick/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('landing/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('landing/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script type="text/javascript">
		$('.js-cart').each(function(){
			
			$(this).on('click', function(e){
				e.preventDefault();
				let url=$(this).attr('href');
				$.ajax({
					url: url
				}).done(function(res){
					$('#cart-content').html('').append(res);
					toastr.options={
					progressBar :  true,
					timeOut: "1000",
					}
					toastr.success('Đã thêm vào giỏ hàng')
				})
			});
		});
	</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('landing/js/main.js')}}"></script>
	@yield('footerJS')
</body>
</html>
