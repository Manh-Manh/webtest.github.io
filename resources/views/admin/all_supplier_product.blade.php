@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
  <div class="panel-heading">
    Liệt kê danh mục sản phẩm
  </div>
  <div class="row w3-res-tb">

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

          <th>ID </th>
          <th>Tên </th>
          <th>address </th>
          <th>phone </th>
          <th>website</th>
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_supplier_product as $key => $supp_value): ?>    
          <tr>
            <td>{{$supp_value -> supplierID}}</td>
            <td>{{$supp_value -> companyName}}</td>
            <td>{{$supp_value -> address}}</td>
            <td>{{$supp_value -> phone}}</td>
            <td>{{$supp_value -> website}}</td>
            <td>
              <a href="{{URL::to('/edit-supplier/'.$supp_value->supplierID)}}" class="active" style="font-size: 20px" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
                
              </a>
              <a href="{{URL::to('/delete-supplier/'.$supp_value->supplierID)}}" class="active" onClick="return confirm('Are you absolutely sure you want to delete?')" style="font-size: 20px" ui-toggle-class="">

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