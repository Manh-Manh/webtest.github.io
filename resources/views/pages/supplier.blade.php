@extends('layout')
@section('content')
<div class="features_items">
    
    <?php foreach ($name_supplier as $key => $value1): ?>
        <h2 class="title text-center">{{$value1->categoryName}}</h2>
    <?php endforeach ?>

    <?php foreach ($all_product as $key => $value): ?>        
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        
                       <?php $thumbnail = ltrim($value->thumbnail) ?>
                       <img src="{{URL::to('public/thumbnail/'.$thumbnail)}}" alt="" />
                        <h2>{{$value->unitPrice}} $</h2>                   
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">                          
                            <p>{{$value->productName}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div><!--features_items-->
@endsection
