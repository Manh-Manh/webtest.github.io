@extends('layout')
@section('content')
{{-- <link rel="stylesheet" href="../resources/sass/app.scss"> --}}
<link rel="stylesheet" href="../resources/sass/styledetail.css">
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<?php foreach ($img as $key => $value1): ?>		
			
			<div id="similar-product" class="carousel slide" data-ride="carousel">
				<?php $getimg = trim($value1->image) ;
				$img = (explode(';', $getimg)) ;
				?>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<a href=""><img  class="subImg" onclick="changeimg()" src="{{URL::to('public/upload/products/'.trim($img[0])) }}" alt=""></a>	
					</div>
					<div class="item">
						<a href=""><img class="subImg" onclick="changeimg()" src="{{URL::to('public/upload/products/'.trim($img[1]))}}" alt=""></a>			
					</div>
					<div class="item">						
						<a href=""><img  class="subImg" onclick="changeimg()" src="{{URL::to('public/upload/products/'.trim($img[2]))}}" alt=""></a>
					</div>

				</div>

				<!-- Controls -->
				<a class="left item-control" href="#similar-product" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right item-control" href="#similar-product" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		<?php endforeach ?>

	</div>
	<div class="col-sm-7">
		<?php foreach ($product as $key => $value): ?>


			<div class="product-information"><!--/product-information-->
				<img src="images/product-details/new.jpg" class="newarrival" alt="" />
				<h2 class="product_name">{{$value->productName}}</h2>
				<hr>
				<!-- <img src="images/product-details/rating.png" alt="" /> -->
				<span>
					<div class="price">
						<div class="unitPrice" <?php echo (double)$value->discount>0?'':'hidden' ?>>
							<s>₫ {{number_format($value->unitPrice)}}</s>
						</div>
						
						<div class="discountPrice">
							₫ {{number_format((1-0.01*(double)$value->discount)*$value->unitPrice )}} 
							<i class="discount" <?php echo (double)$value->discount>0?'':'hidden' ?>>-{{$value->discount}}% </i>
						</div>
						
					<div class=""><b>Quantity:</b>
						<input type="number" value="1" min="1" class="quantity"/>
					</div>
			
				</span>
				<div class="availability"><b>Availability:
				   </b>
				   <?php
				 	echo $value->quantity >0?"In Stock":"Out Stock";  
				   ?>
				</div>
			<div><b>Supplier:</b> {{$value->companyName}}</div>
				<div ><b>Category:</b> {{$value->categoryName}}</div>
				<br>
				
				<!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
			</div><!--/product-information-->
			<!-- Button -->
			<div class="button">
				<!-- button Back -->
					<button type="button" class="btn btn-info btnBack">
							<i class="fa fa-shopping-cart"></i>
							Back To Shopping
					</button>
					<!-- button Add to cart -->
					<button type="button" class="btn btn-success  btnAddToCart">
							<i class="fa fa-shopping-cart"></i>
							Add to cart
					</button>
				</div>
				<!-- /Button -->
		<?php endforeach ?>
	</div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12 ">
		<ul class="nav nav-tabs">
			<li class="active" ><a href="#details" data-toggle="tab">Details</a></li>
			<li  ><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>						
		</ul>
	</div>
	<?php foreach ($product as $key => $value): ?>
		<div class="tab-content">
			<!-- tab: detail -->
			<div class="tab-pane fade active in" id="details" >
				<p class="description"> {{$value->description}}</p>
			</div>
			<!-- tab: copanyprofile -->
			<div class="tab-pane fade " id="companyprofile" >
				<p>
					<a>Catrgory: {{$value->categoryName}}</a><br>
					<a >Supplier : {{$value->companyName}}</a><br>
					<a >Address: {{$value->supAdd}}</a><br>
					<a >Website : {{$value->supWeb}}</a><br>
					<a >Phone : {{$value->supPhone}}</a>
						
				</p>
				
			</div>											
		</div>
	<?php endforeach ?>
</div><!--/category-tab-->

<script type="text/javascript">
	$(document).ready(function(){
		$(".subImg").click(function(){
			var $x = $('.subImg').attr('src');
			$("#item-display").attr("src",$x);
		});
	});
	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection