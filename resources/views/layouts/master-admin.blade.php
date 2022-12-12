<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Car-Parking</title>
@include('partials.header')
<body class="sidebar-dark">
	<div class="main-wrapper">
        <div class="page-wrapper">
            @include('partials.sidebar')
            @include('partials.topnav')
            @yield('content')
            @include('partials.footer')
        </div>
    </div>
   

</body>
<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
<script>
    @if(session('sweet'))
    swal("{{session('sweet')['title']}}", "{{session('sweet')['message']}}", "{{!empty(session('sweet')['type'])? session('sweet')['type']: 'success'}}");
    @endif
</script>
@show

</html>