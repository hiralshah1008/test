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
        .btn-theme{
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
					<h1 class="mb-10">Cofee Shop Menu Item</h1>
					<p>Add your coffee shop menu item.</p>
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
            
            <div class="col-md-12">
                <form name="addMenu" action="" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Menu Item Name</label>
                            <input type="text" name="item_name" class="form-control" id="inputItemName" onblur="validateTextbox('item_name')" placeholder="Menu Item Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputImage">Upload Item Image</label>
                            <input type="file" name="item_image" class="form-control" id="inputImage"  onblur="validateTextbox('item_image')" placeholder="Menu Item Image">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Select Menu Category</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="item_categoy" onchange="validateTextbox('item_categoy')">
                                <option value="">Select Item Category</option>
                                @foreach ($categories as $key => $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Select Item Ingredirnts</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2"  name="item_ingredient[]"  onchange="validateTextbox('item_ingredient[]')">
                                <option value="">Select Item Ingredients</option>
                                @foreach ($ingredients as $key => $ingredient)
                                <option value="{{$ingredient->id}}">{{$ingredient->ingredient_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label for="inputAddress">Item Description</label>
                        <textarea class="form-control" name="item_desc"  onblur="validateTextarea('item_desc')"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Menu Item Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" min="0" class="form-control" name="item_price" onblur="validateTextbox('item_price')">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Select Item availability</label><br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="item_status" id="inlineRadio1" value="Y" checked>
                                    <label class="form-check-label" for="inlineRadio1">Available</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="item_status" id="inlineRadio2" value="N">
                                    <label class="form-check-label" for="inlineRadio2">Not Available</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="submit" value="1"/>
					<button id="addMenuItem" type="submit"  class="btn btn-theme btn-lg btn-block">Add Item to Menu</span>

                </form>
            </div>
        </div>

    </div>
</section>
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
            function validateSelect(name){
                var value = $.trim($('select[name="'+name+'"]').val());
                var result=(/<img.*|<script.*|<style.*|<embeded.*/ig).test(value);
                if(value == ""){
                    $('select[name="'+name+'"]').addClass('invalid');
                }else if(result){
                    $('select[name="'+name+'"]').addClass('invalid');
                }else{
                    $('select[name="'+name+'"]').removeClass('invalid');
                }
            }
            function validateTextarea(name){
                var value = $.trim($('textarea[name="'+name+'"]').val());
                var result=(/<img.*|<script.*|<style.*|<embeded.*/ig).test(value);
                if(value == ""){
                    $('textarea[name="'+name+'"]').addClass('invalid');
                }else if(result){
                    $('textarea[name="'+name+'"]').addClass('invalid');
                }else{
                    $('textarea[name="'+name+'"]').removeClass('invalid');
                }
            }
        $(document).ready(function(){
        //validation starts

		$('#addMenuItem').click(function(e){
			$('form[name="addMenu"] input').each(function(){
				validateTextbox($(this).attr('name'));
            });
            $('form[name="addMenu"] select').each(function(){
				validateSelect($(this).attr('name'));
            });
            $('form[name="addMenu"] textarea').each(function(){
				validateTextarea($(this).attr('name'));
			});
			
			var validation = true;
			$('form[name="addMenu"] input, select').each(function(){
				if($(this).hasClass('invalid')){
					$(this).focus();
					validation = false;
					return false;
				}
			}); 
			if(validation){
				$('form[name="addMenu"]').submit();
			}else{
				e.preventDefault();
				return false;
			}

        });
    });
    </script>
@endsection