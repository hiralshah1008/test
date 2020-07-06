@extends('inc.structure')

@section('content')

<!-- ================= Start of Navigation Bar ======================= -->
@include('inc.navbar')
<!-- ================= End of Navigation Bar ======================= -->

<!-- start banner Area -->
<section class="banner-area" id="home">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-start">
				<div class="banner-content col-lg-7">
					<h6 class="text-white text-uppercase">Now you can feel the Energy</h6>
					<h1>
						Start your day with <br>
						a black Coffee
					</h1>
					<a href="#" class="primary-btn text-uppercase">Buy Now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start video-sec Area -->
	<section class="video-sec-area pb-100 pt-40" id="about">
		<div class="container">
			<div class="row justify-content-start align-items-center">
				<div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
					<div class="overlay overlay-bg"></div>
					<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM">
						{!! Html::image('img/play-icon.png', 'Cafe Logo',  ['class' => 'img-fluid']) !!}
					</a>
				</div>
				<div class="col-lg-6 video-left">
					<h6>Live Coffee making process.</h6>
					<h1>We Telecast our <br>
						Coffee Making Live</h1>
					<p><span>We are here to listen from you deliver exellence</span></p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim.
					</p>
					{!! Html::image('img/signature.png', '',  ['class' => 'img-fluid']) !!}

				</div>
			</div>
		</div>
	</section>
	<!-- End video-sec Area -->

	<!-- Start menu Area -->
	<section class="menu-area section-gap" id="coffee">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">Your favorite cafe</h1>
						<p>Coffee lovers, checkout these amazing coffee shops.</p>
					</div>
				</div>
			</div>
			<div class="row" id="shops">
				<div class="col-md-4">

					<!-- Card -->
					<div class="card">

						<!-- Card image -->
						
							{!! Html::image('img/g4.jpg', 'Card image cap',  ['class' => 'card-img-top']) !!}

						<!-- Card content -->
						<div class="card-body">

							<!-- Title -->
							<h4 class="card-title"><a>Card title</a></h4>
							<!-- Text -->
							<p class="card-text">Some quick example text to build on the card title and make up the bulk
								of the card's
								content.</p>
							<!-- Button -->
							<a href="#" class="btn btn-primary">Button</a>

						</div>

					</div>
					<!-- Card -->
				</div>
			</div>
			<!--<div class="row">
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Cappuccino</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Americano</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Espresso</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Macchiato</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Mocha</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Coffee Latte</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Piccolo Latte</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Ristretto</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-menu">
						<div class="title-div justify-content-between d-flex">
							<h4>Affogato</h4>
							<p class="price float-right">
								$49
							</p>
						</div>
						<p>
							Usage of the Internet is becoming more common due to rapid advance.
						</p>
					</div>
				</div>
			</div>
		</div>-->
	</section>
	<!-- End menu Area -->

	<!-- Start gallery Area -->
	<section class="gallery-area section-gap" id="gallery">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">Coffee shops in your city!</h1>
						<p>Who are in extremely love with coffee.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<a href="img/g1.jpg" class="img-pop-home">
						{!! Html::image('img/g1.jpg', '',  ['class' => 'img-fluid']) !!}

						
					</a>
					<a href="img/g2.jpg" class="img-pop-home">
					{!! Html::image('img/g2.jpg', '',  ['class' => 'img-fluid']) !!}
					</a>
				</div>
				<div class="col-lg-8">
					<a href="img/g3.jpg" class="img-pop-home">
					{!! Html::image('img/g3.jpg', '',  ['class' => 'img-fluid']) !!}
					</a>
					<div class="row">
						<div class="col-lg-6">
							<a href="img/g4.jpg" class="img-pop-home">
							{!! Html::image('img/g4.jpg', '',  ['class' => 'img-fluid']) !!}
							</a>
						</div>
						<div class="col-lg-6">
							<a href="images/g5.jpg" class="img-pop-home">
							{!! Html::image('img/g5.jpg', '',  ['class' => 'img-fluid']) !!}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End gallery Area -->

	<!-- Start review Area -->
	<!--<section class="review-area section-gap" id="review">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">What kind of Coffee we serve for you</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 single-review">
					{!! Html::image('img/r1.png', '' ) !!}

					<div class="title d-flex flex-row">
						<h4>lorem ipusm</h4>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
				<div class="col-lg-6 col-md-6 single-review">
					{!! Html::image('img/r2.png', '' ) !!}

					<div class="title d-flex flex-row">
						<h4>lorem ipusm</h4>
						<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
						</div>
					</div>
					<p>
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
						scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
						printer, scanner, speaker.
					</p>
				</div>
			</div>
			<div class="row counter-row">
				<div class="col-lg-3 col-md-6 single-counter">
					<h1 class="counter">2536</h1>
					<p>Happy Client</p>
				</div>
				<div class="col-lg-3 col-md-6 single-counter">
					<h1 class="counter">7562</h1>
					<p>Total Projects</p>
				</div>
				<div class="col-lg-3 col-md-6 single-counter">
					<h1 class="counter">2013</h1>
					<p>Cups Coffee</p>
				</div>
				<div class="col-lg-3 col-md-6 single-counter">
					<h1 class="counter">10536</h1>
					<p>Total Submitted</p>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End review Area -->

	<!-- Start blog Area -->
	<!--<section class="blog-area section-gap" id="blog">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">What kind of Coffee we serve for you</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 single-blog">
					{!! Html::image('img/b1.jpg', '', ['class' => 'img-fluid'] ) !!}

					<ul class="post-tags">
						<li><a href="#">Travel</a></li>
						<li><a href="#">Life Style</a></li>
					</ul>
					<a href="#">
						<h4>Portable latest Fashion for young women</h4>
					</a>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
						labore et dolore.
					</p>
					<p class="post-date">
						31st January, 2018
					</p>
				</div>
				<div class="col-lg-6 col-md-6 single-blog">
					{!! Html::image('img/b2.jpg', '', ['class' => 'img-fluid'] ) !!}

					<ul class="post-tags">
						<li><a href="#">Travel</a></li>
						<li><a href="#">Life Style</a></li>
					</ul>
					<a href="#">
						<h4>Portable latest Fashion for young women</h4>
					</a>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
						labore et dolore.
					</p>
					<p class="post-date">
						31st January, 2018
					</p>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End blog Area -->

<!-- ================= Start of Footer ======================= -->
@include('inc.footer')
<!-- ================= End of Footer ======================= -->

@endsection

@section('customjavascript')
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
			url: 'http://localhost/coffeeshop/public/getAllShop/3',
			type: "GET",
			success: function(data) {
				if(data.status == true) {
					var shopListHtml = '';
				$.each(data.shopList, function(i, v) {
					
					var address = v.shop_add1 +" "+ v.shop_add2 + ", " +v.shop_city +", " +v.shop_state +", "+v.shop_zip;
					shopListHtml+=	'<div class="col-md-4 mb-10"><div class="card"><img src="/coffeeshop/storage/app/'+v.shop_image+'" class="card-img-top" style="height:230px" alt="Card image cap"> <!-- Card content --><div class="card-body"><!-- Title --><h4 class="card-title"><a>'+v.shop_name+'</a></h4><!-- Text --><p class="card-text">'+address+'</p><!-- Button --><a target="_blank" href="http://localhost/coffeeshop/public/getShopDetail/'+v.id+'">Details</a></div></div></div>';
				});
				shopListHtml+='<a class="mb-10 col-md-12 btn btn-theme" href="http://localhost/coffeeshop/public/listAllShop/">Find More Coffee Shops</a>';

					console.log(shopListHtml);
				
					$('#shops').html(shopListHtml);
				}
			},
			error: function(data) {

			} 
			}); 
		});
</script>
@endsection