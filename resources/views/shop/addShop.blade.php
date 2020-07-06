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
		form label, form p{
			font-weight: 500;
			font-size:16px;
			color: black
		}
		.invalid{
			border: 2px solid red !important;
		}
		.hourheading{
			background: rgba(20, 2, 0, 0.8);
			color: white;
		}
	</style>
@endsection

<section class="section-gap">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title text-center">
					<h1 class="mb-10">Cofee Shop</h1>
					<p>Add your coffee shop.</p>
				</div>
			</div>
		</div>

		

		<div class="row">
			@if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            @if(session('csrf_error'))
                <div class="alert alert-dismissable alert-info fadein" align="center">
                    {{ $csrf_error }}
                </div>
			@endif
			@foreach ($errors->all() as $error)
				<div class="alert alert-dismissable alert-danger fadein">
					{{ $error }}
				</div>
			@endforeach
			<div class="col-md-12">
			{!! Form::open(['method' => 'post','name' => 'addShop','url' => 'addShop','enctype'=>'multipart/form-data']) !!}
				<!--<form action="addShop" name="addShop" method="POST" enctype="multipart/form-data" >-->
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Name</label>
							<input type="text" name="shop_name" class="form-control" id="inputName" value="{{old('shop_name') }}"onblur="validateTextbox('shop_name')" placeholder="Coffee Shop Name">
						</div>
						<div class="form-group col-md-6">
							<label for="inputImage">Upload Shop Image</label>
							<input type="file" name="shop_image" class="form-control" id="inputImage" placeholder="Coffee Shop Image">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" name="shop_add1" class="form-control" id="inputAddress" placeholder="1234 Main St">
					</div>
					<div class="form-group">
						<label for="inputAddress2">Address 2</label>
						<input type="text" name="shop_add2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputCity">City</label>
							<input type="text" name="shop_city" class="form-control" id="inputCity">
						</div>
						<div class="form-group col-md-4">
						<label for="inputState">State</label>
						<select id="inputState" class="form-control" name="shop_state">
							<option value="">Choose...</option>
							@foreach ($states as $key => $state)
							<option value="{{$key}}">{{$state}}</option>
							@endforeach
						</select>
						</div>
						<div class="form-group col-md-2">
							<label for="inputZip">Zipcode</label>
							<input type="text" class="form-control" id="inputZip" name="shop_zipcode">
						</div>
					</div>
					<div class="form-row">
					<div class="form-group col-md-12">
						<p>Shop Status</p>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="shop_status" id="inlineRadio1" value="O" checked>
							<label class="form-check-label" for="inlineRadio1">Open</label>
						</div>
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="shop_status" id="inlineRadio2" value="TC">
						<label class="form-check-label" for="inlineRadio2">Temporarily Closed</label>
						</div>
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="shop_status" id="inlineRadio3" value="PC">
						<label class="form-check-label" for="inlineRadio3">Permanently Closed</label>
						</div>
						</div>
					</div>

					<div class="form-row mb-10 text-center">
						<h4 class="col-md-12 mb-20 hourheading"> Select Shop Open Hours </h4>
					</div>
					<!--<div class="form-check mb-20">
							<input class="form-check-input" type="checkbox" value="" id="sameTime">
							<label class="form-check-label" for="defaultCheck1">
								Same time all day
							</label>
					</div>-->
					<div class="form-row">
						
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Monday</h4>
							</div>
							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="monday" name="day_status[monday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="monday" name="day_status[monday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>
							<div class="col-md-12 form-group">
								<select id="time_monday_0" name="time[monday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_monday">to</h6>
								<select id="time_monday_1"  name="time[monday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Tuesday</h4>
							</div>
							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="tuesday" name="day_status[tuesday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="tuesday" name="day_status[tuesday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>
							<div class="col-md-12 form-group">
								<select  id="time_tuesday_0" name="time[tuesday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_tuesday">to</h6>
								<select  id="time_tuesday_1" name="time[tuesday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Wednesday</h4>
							</div>

							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="wednesday" name="day_status[wednesday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="wednesday" name="day_status[wednesday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>

							<div class="col-md-12 form-group" >
								<select  id="time_wednesday_0" name="time[wednesday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_wednesday">to</h6>
								<select  id="time_wednesday_1" name="time[wednesday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Thursday</h4>
							</div>

							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="thursday" name="day_status[thursday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="thursday" name="day_status[thursday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>

							<div class="col-md-12 form-group">
								<select  id="time_thursday_0" name="time[thursday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_thursday">to</h6>
								<select  id="time_thursday_1" name="time[thursday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Friday</h4>
							</div>

							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="friday" name="day_status[friday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="friday" name="day_status[friday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>

							<div class="col-md-12 form-group">
								<select  id="time_friday_0" name="time[friday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_friday">to</h6>
								<select  id="time_friday_1" name="time[friday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Saturday</h4>
							</div>

							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="saturday" name="day_status[saturday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="saturday" name="day_status[saturday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>

							<div class="col-md-12 form-group">
								<select  id="time_saturday_0" name="time[saturday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_saturday">to</h6>
								<select  id="time_saturday_1" name="time[saturday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>
						<div class="form-group col-md-3">
							<div class="col-md-12 form-group">
								<h4>Sunday</h4>
							</div>
							<div class="col-md-12 form-group">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn btn-light active">
									<input type="radio"  data-day="sunday" name="day_status[sunday]" value="open" id="option1" autocomplete="off" > Open
								</label>
								<label class="btn btn-light">
									<input type="radio" data-day="sunday" name="day_status[sunday]" value="closed"  id="option2" autocomplete="off" checked> Closed
								</label>
								
								</div>
							</div>

							<div class="col-md-12 form-group">
								<select id="time_sunday_0" name="time[sunday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
								<h6 class="text-center mb-10 mt-10" id="label_sunday">to</h6>
								<select  id="time_sunday_1" name="time[sunday][]" class="form-control">
									@foreach ($timePicker as $ktimeslot =>$vtimeslot)
										<option value='{{$ktimeslot}}'>{{$vtimeslot}}</option>
									@endforeach   
								</select>
							</div>
						</div>					
					</div>
					<input type="hidden" name="submit" value="1"/>
					<button id="addShop" type="submit"  class="btn btn-primary btn-lg btn-block">Add Shop</span>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- ================= Start of Footer ======================= -->
@include('inc.footer')
<!-- ================= End of Footer ======================= -->

@endsection



@section('customjavascript')
	<script type="text/javascript">
	function validateTextbox(name){
			
			var value = $.trim($('input[name="'+name+'"]').val());
			var result=(/<img.*|<script.*|<style.*|<embeded.*/ig).test(value);
			if(value == ""){
				$('input[name="'+name+'"]').addClass('invalid');
			}else if(result){
				$('input[name="'+name+'"]').addClass('invalid');
			}else{
				$('input[name="'+name+'"]').removeClass('invalid');
			}
		}

		function updateTime(){
			$('input[name^="day_status"]').each(function(){
				console.log($(this).val());
				if($(this).val() == 'closed'){
					var day = $(this).data('day');
					$('#time_'+day+'_0').val('');
					$('#time_'+day+'_1').val('');
				}

			});
		}
		
		$('input[name^="day_status"]').each(function(){
			$(this).change(function(){
				var day = $(this).data('day');
				if($(this).val() == 'open'){
					$('select[name="time['+day+'][]"]').show();
					$('#label_'+day).show();
				}else{
					$('select[name="time['+day+'][]"]').hide();
					$('#label_'+day).hide();
				}
				$('input[name="day_status['+day+']"').closest('label.active').css({"border-color": "black", 
				"border-width":"1px", 
				"border-style":"solid"});
			});
				
		})


		$('input[name^="day_status"]').each(function(){
			if($(this).is(':checked')){
				$(this).click();
			}
		});

		$(document).ready(function(){
		
		//validation starts

			$('#addShop').click(function(e){
			
			
			$('form[name="addShop"] input').each(function(){
				if($(this).attr('name') != 'shop_add2'){
					validateTextbox($(this).attr('name'));
				}
			});
			
			var validation = true;
			$('form[name="addShop"] input, select').each(function(){
				if($(this).hasClass('invalid')){
					$(this).focus();
					validation = false;
					return false;
				}
			}); 
			if(validation){
				//updateTime();
				$('form[name="addShop"]').submit();
			}else{
				e.preventDefault();
				return false;
			}

		});
		var startTime;
		$("select[id^='time_']").each(function(key){
			
			$(this).change(function(){
				var day = $(this).attr('id').split("_")[1];
				var endTime = $('#time_'+day+'_'+1).val();
				var startTime = $('#time_'+day+'_'+0).val();
				convertTime12to24(day,startTime,endTime)
				
			})
		});
		/*$('#sameTime').on('change',function(){
			if($(this).is(':checked')){
				$('input[name^="day_status"]').each(function(){
					$("input[name^="day_status"][value='open']").attr('checked', 'checked');

				});
			}
		})*/
	});
function convertTime12to24(day,stime12h,etime12h) {
	
		var stime12hArr = stime12h.match(/.{1,5}/g); // ["abc", "d"]
				
        var stime =stime12hArr[0];
        var smodifier = stime12hArr[1];
        var shours = stime.split(':')[0];
        var sminutes = stime.split(':')[1];
        if (shours === '12') {
          shours = '00';
        }
      
        if (smodifier === 'PM') {
          shours = parseInt(shours, 10) + 12;
        }

		var etime12hArr = etime12h.match(/.{1,5}/g); // ["abc", "d"]
				
        var etime =etime12hArr[0];
        var emodifier = etime12hArr[1];
        var ehours = etime.split(':')[0];
        var eminutes = etime.split(':')[1];
        if (ehours === '12') {
          ehours = '00';
        }
      
        if (emodifier === 'PM') {
          ehours = parseInt(ehours, 10) + 12;
        }

		console.log( new Date('', '', '', ehours, eminutes));
        //return `${hours}:${minutes}`;

		if( new Date('', '', '', ehours, eminutes) <= new Date('', '', '', shours, sminutes)){
			
			$('#time_'+day+'_0').addClass('invalid');
			$('#time_'+day+'_1').addClass('invalid');

		}else{
			$('#time_'+day+'_0').removeClass('invalid');
			$('#time_'+day+'_1').removeClass('invalid');
		}
      }
      console.log("12:00AM".match(/.{1,5}/g)); // ["abc", "d"]

</script>
@endsection