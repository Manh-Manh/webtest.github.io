@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Basic Forms
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
                    <form role="form" action="{{URL::to('/save_supplier')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group" method>
                            <label for="exampleInputEmail1">ID thương hiệu</label>
                            <input type="text" name="supplierID" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên thương hiệu</label>
                            <textarea type="password" style="resize: none;" rows="1" name="companyName" class="form-control" id="exampleInputPassword1" placeholder="Tên thương hiệu"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <textarea type="password" style="resize: none;" rows="1" name="address" class="form-control" id="exampleInputPassword1" placeholder="Địa chỉ"></textarea>   
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <textarea type="password" style="resize: none;" rows="1" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone Number"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Website</label>
                            <textarea type="password" style="resize: none;" rows="1" name="website" class="form-control" id="exampleInputPassword1" placeholder="Website"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm Thương Hiệu</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection