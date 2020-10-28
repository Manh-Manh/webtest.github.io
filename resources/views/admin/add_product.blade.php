@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phảm
            </header>
            <div class="panel-body">
                <?php 
            $message = Session::get('message');
            if($message)
            {
                echo '<span class ="text-alert" style="text-align">' .$message. '</span>';
                Session::put('message',null);
            }
            ?> 
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save_product')}}" method="post" 
                    enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group" method>
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group" method>
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group" method>
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_img" class="form-control" id="exampleInputEmail1"  multiple="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm </label>
                            <textarea type="text" style="resize: none;" rows="5" name="product_desc" class="form-control" id="exampleInputPassword1" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Nội dung sản phẩm </label>
                            <textarea type="text" style="resize: none;" rows="5" name="product_content" class="form-control" id="exampleInputPassword1" ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_category" class="form-control input-sm m-bot15">
                                <?php foreach ($cate_product as $key => $cate_value): ?>
                                    <option  value="{{$cate_value->category_id}}">{{$cate_value->category_name}}</option>
                                <?php endforeach ?>
                                
                                                        
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương Hiệu</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                <?php foreach ($brand_product as $key => $brand_value): ?>
                                    <option value="{{$brand_value->brand_id}}" >{{$brand_value->brand_name}}</option>
                                <?php endforeach ?>                         
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection