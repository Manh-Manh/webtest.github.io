@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
  <div class="panel-heading">
    Liệt kê danh mục sản phẩm
  </div>
  <div class="row w3-res-tb">
    <div class="col-sm-5 m-b-xs">
      <select class="input-sm form-control w-sm inline v-middle">
        <option value="0">Bulk action</option>
        <option value="1">Delete selected</option>
        <option value="2">Bulk edit</option>
        <option value="3">Export</option>
      </select>
      <button class="btn btn-sm btn-default">Apply</button>                
    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-3">
      <div class="input-group">
        <input type="text" class="input-sm form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn btn-sm btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <?php 
    $message = Session::get('message');
    if($message)
    {
      echo '<span class ="text-alert" style="text-align">' .$message. '</span>';
      Session::put('message',null);
    }
    ?> 
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th style="width:20px;">
            <label class="i-checks m-b-none">
              <input type="checkbox"><i></i>
            </label>
          </th>
          <th>Tên sản phẩm</th>
          <th>Giá sản phẩm</th>
          <th>Hình ảnh</th>       
          <th>Danh mục</th>
          <th>Thương Hiệu</th>
          <th>Hiển thị</th>
          <th style="width:25px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_product as $key => $pro): ?>     
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$pro -> product_name}}</td>
            <td>{{$pro -> product_price}}</td>
            <td><img src="public/upload/product/{{$pro -> product_img}}" style="height: 100px;width: 100px;"></td>
            <td>{{$pro -> category_name}}</td>
            <td>{{$pro -> brand_name}}</td>
            <td><span class="text-ellipsis">
              <?php 
              if ($pro->product_status ==0) {
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}" >
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="8" cy="8" r="8"/>
                  </svg>
                </a>
                <?php
              } else {
                ?>
                <a href="{{URL::to('/active-product/'.$pro->product_id)}}" >
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-circle-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15V1a7 7 0 1 1 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                  </svg></a>
                  <?php
                }

                ?>

              </span></td>
              <td>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active" style="font-size: 20px" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>

                </a>
                <a href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active" onClick="return confirm('Are you absolutely sure you want to delete?')" style="font-size: 20px" ui-toggle-class="">

                  <i class="fa fa-times text-danger text"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection