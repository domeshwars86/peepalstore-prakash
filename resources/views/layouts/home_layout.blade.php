<!DOCTYPE html>
<html lang="en">
	@include('includes.head')

	<body class="sub_page">
		@include('includes.header')
		@include('includes.loginmodal')

		@yield('content')

		@include('includes.footer')

		  <!-- popper js -->
		  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
		  </script>
		  <!-- bootstrap js -->
		  <script src="{{asset('js/bootstrap.js')}}"></script>
		  <!-- owl slider -->
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
		  </script>
		  <!-- custom js -->
		  <script src="{{asset('js/custom.js')}}"></script>
		  <!-- Google Map -->
		  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
		  <!-- End Google Map -->

	</body>

</html>