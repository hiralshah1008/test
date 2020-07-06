@extends('inc.structure')

@section('content')

<!-- ================= Start of Navigation Bar ======================= -->
@include('inc.navbar')
<!-- ================= End of Navigation Bar ======================= -->
@section('pagecss')
	<style>
		#header{
			background: rgba(20, 2, 0, 0.8);
        }
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid rgba(20, 2, 0, 0.8);;
            border-bottom: 16px solid rgba(20, 2, 0, 0.8);;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
	</style>
@endsection

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
    <section class="section-gap">
        <div class="container">


            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">All Coffee Shop</h1>
                    </div>
                </div>
            </div>
            
           
            <nav class="navbar navbar-light bg-light justify-content-between mb-50">
            <a class="navbar-brand">Filter</a>
            <form class="form-inline">
                <select id="filter_name" class="form-control">
                        <option value="all">Sort by Shop Name</option>
                        <option value="Asc">Ascending</option>
                        <option value="Desc">Descending</option>
                </select>
                <select id="filter_status"  class="form-control ml-10 mr-10">
                        <option value="all">Select Shop Status</option>
                        <option value="ON">Open Now</option>
                        <option value="CN">Closed</option>
                    </select>
                    <span id="filter_submit" class="btn btn-outline-success my-2 my-sm-0">Filter</span>
            </form>
            </nav>

            <div class="row" id="allShop">

            </div>




        </div>
    </section>
<!-- ================= Start of Footer ======================= -->
@include('inc.footer')
<!-- ================= End of Footer ======================= -->

@endsection

@section('customjavascript')
    <script type="text/javascript">
        function getShopList(url){
            if(url == ''){
                return false;
            }
            $.ajax({
			url: url,
			type: "GET",
			beforeSend: function(){
                $('#allShop').html('<div class="loader"></div>');
            },
			success: function(data) {
				if(data.status == true) {
                    var shopListHtml = '';
                    var shopListHtml1 ='<div class="card-deck">';
                    $.each(data.shopList, function(i, v) {
                    var address = v.shop_add1 +" "+ v.shop_add2 + ", " +v.shop_city +", " +v.shop_state +", "+v.shop_zip;

                    
                    var shopHour = JSON.parse(v.shop_hour);

                    //console.log(shopHour);
                    var hourStr = "";
                    jQuery.each(shopHour.time, function(i, val) {
                        if(val[0] == '12:00AM' && val[1] == '12:00AM'){
                            hourStr+= i.charAt(0).toUpperCase() + i.slice(1) + ": Closed" +"<br/>";
                        }else{
                            hourStr+= i.charAt(0).toUpperCase() + i.slice(1) + ": "+ val[0] + " - " + val[1] + "<br/>";
                        }
                        
                    });
                    console.log(hourStr)
                    shopListHtml+=	'<div class="col-md-4 mb-10"><div class="card"><img style="height:230px" src="/coffeeshop/storage/app/'+v.shop_image+'" class="card-img-top" alt="Card image cap"> <!-- Card content --><div class="card-body"><!-- Title --><h4 class="card-title"><a>'+v.shop_name+'</a></h4><!-- Text --><p class="card-text">'+address+'</p><b> Working hours</b></p><p class="card-text">'+hourStr+'</p><!-- Button --><a target="_blank" href="http://localhost/coffeeshop/public/getShopDetail/'+v.id+'" >Details</a></div></div></div>';
                    
                   
                    
                    });
                    
                    if(shopListHtml == ''){
                        shopListHtml = "<div> Sorry! No Shops are open now</div>";
                    }
                    
                    $('#allShop').html(shopListHtml);
				}
			},
			error: function(data) {

			} 
			}); 
        }
		$(document).ready(function(){
            var url = 'http://localhost/coffeeshop/public/getAllShop';
            getShopList(url);

            $('#filter_submit').click(function(){
                var shopNmae = $('#filter_name').val();
                var shopStatus = $('#filter_status').val();
                var url = 'http://localhost/coffeeshop/public/getAllShop/all/'+shopNmae+'/'+shopStatus;
                
                getShopList(url)
            })
            
		});

        
</script>
@endsection