
<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Tay cầm chơi game</h2>
    <h1>@php
        print_r($dataSearch);
    @endphp </h1>
    <?php foreach ($product as $key => $value): ?>        
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">   
                     <?php $thumbnail = ltrim($value->thumbnail) ?>
                     <img src="{{URL::to('public/upload/products/'.$thumbnail)}}" alt="" />                     
                     <h2><?php {{echo number_format($value->unitPrice) ;}} ?> $</h2>                   
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                 </div>
                 <div class="product-overlay">
                    <a href="{{URL::to('/detail/'.$value->productID)}}">
                        <div class="overlay-content">                                             
                            <p>{{$value->productName}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </a>
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