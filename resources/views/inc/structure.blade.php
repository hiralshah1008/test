
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Coffee</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    
    <!--
			CSS
			============================================= -->
	{!! Html::style('css/linearicons.css') !!}
	{!! Html::style('css/font-awesome.min.css') !!}
	{!! Html::style('css/bootstrap.css') !!}
	{!! Html::style('css/magnific-popup.css') !!}
	{!! Html::style('css/nice-select.css') !!}
	{!! Html::style('css/animate.min.css') !!}
	{!! Html::style('css/owl.carousel.css') !!}
    {!! Html::style('css/main.css') !!}
    @yield('pagecss')

</head>

<body>


@yield('content')

@include('inc.fixscript')

@yield('customjavascript')

	
	


</body>

</html>