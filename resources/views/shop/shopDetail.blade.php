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
        .navactive{
            border-top: 3px solid rgba(20, 2, 0, 0.8);
            border-right: 3px rgba(20, 2, 0, 0.8) solid;
            border-left: 3px solid rgba(20, 2, 0, 0.8);
        }
        .nav{
            border-bottom: 3px solid rgba(20, 2, 0, 0.8);
        }
        .nav span strong{
            cursor: pointer;
        }
        .text-red{
            color:red;
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
						Checkout Menu <br>{{$shop->shop_name}}
						
					</h1>
				</div>
			</div>
		</div>
	</section>
    <!-- End banner Area -->
    <section class="section-gap">
        <div class="container">


            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-md-9">
                    <div class="title">
                        <h1 class="mb-10">{{$shop->shop_name}}</h1>
                        <p>Open Today: {{$shop->todaysHours}}</p>
                        <p>{{$shop->shop_add1}} 
                            @if ($shop->shop_add2 != ""){{$shop->shop_add2}}  @endif
                            {{$shop->shop_city}} , {{$shop->shop_zip}}
                        </p>
                    </div>
                </div>
                <div class="menu-content pb-60 col-md-3">
                    <img src="/coffeeshop/storage/app/{{$shop->shop_image}}" alt="{{$shop->shop_name}}" class="img-fluid" />
                </div>
            </div>
            
            @if (!empty($shop_array)) 

            <nav class="nav nav-pills flex-column flex-sm-row mb-50">
                @foreach($shop_array as $catname=>$v)
                    <span class="flex-sm-fill text-sm-center nav-link @if ($loop->first) navactive @endif" id="cat_{{Str::replaceArray(' ', [''], $catname)}}"><strong>{{$catname}}</strong></span>
                @endforeach
            </nav>

            @endif
            <div class="row">
                @if (!empty($shop_array)) 
                @foreach($shop_array as $catname=>$v)
                    <div class="row col-md-12" id="menu_{{Str::replaceArray(' ', [''], $catname)}}">
                        <h5 class="col-md-12 ">{{$catname}}</h5>
                        @foreach($v as $k1=>$v1)
                        <div class="col-md-4">
                            <div class="single-menu">
                                <div class="title-div justify-content-between d-flex">
                                    <h4>{{$v1->item_name}}</h4>
                                    <p class="price float-right">
                                        ${{$v1->item_price}}
                                    </p>
                                </div>
                                <p>
                                    {{$v1->Item_desc}}
                                </p>
                                <p>
                                    {{$v1->ingredients}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
                @else
                    <div class="col-md-12">
                        <h6 class="text-red text-center">Opps! Menu not available for this shop.</h6>
                    </div>
                @endif
            </div>
            
            




        </div>
    </section>
<!-- ================= Start of Footer ======================= -->
@include('inc.footer')
<!-- ================= End of Footer ======================= -->

@endsection

@section('customjavascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('span[id^="cat_"]').click(function(){
                $('span[id^="cat_"]').removeClass('navactive');
                $(this).addClass('navactive');
                var catname = $(this).attr('id').split("_")[1];
                $('html,body').animate({
                 scrollTop: $("#menu_"+catname).offset().top - $('#header').outerHeight() - 30},
                'slow');
            })
        })

        
    </script>
@endsection