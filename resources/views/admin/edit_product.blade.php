@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cap nhat san pham
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                      ?>
                        <div class="panel-body">
                            @foreach($edit_product as $key=> $pro) 
                            <div class="position-center">
                                <form role="form"action="{{URL::to('update_product/'.$pro->product_id)}} " method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Ten san pham </label>
                                    <input type="text" name="product_name" class="form-control"  value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label >Hinh anh san pham</label>
                                    <input type="file" name="product_image" class="form-control"  value="{{$pro->product_image}}">
                                    <img src="public/uploads/product/{{$pro->product_image}} " height="100"  width="100"
                >
                                </div>
                                <div class="form-group">
                                    <label >Mo ta san pham</label>
                                    <input   type="text" row="8"   name="product_desc"class="form-control"  value="{{$pro->product_desc}}">
                                    
                                </div>
                                <div class="form-group">
                                    <label >Noi dung san pham</label>
                                    <input   type="text" row="8"   name="product_content"class="form-control" value="{{$pro->product_content}}">
                                   
                                </div>
                                <div class="form-group">
                                    <label >Gia san pham </label>
                                    <input type="text" name="product_price" class="form-control" value="{{$pro->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label>Danh muc san pham</label>
                                <select name="product_cate"class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key=>$cate)
                                    @if ($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>

                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                    @endforeach
                                    
                                    
                                    
                                </select>
                                <div class="form-group">
                                    <label >Thuong hieu san pham</label>
                                <select name="product_brand"class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key=>$brand)
                                    @if ($brand->brand_id==$pro->brand_id)
                                    <option  selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                     @else
                                     <option  value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                     @endif
                                    @endforeach
                                      
                                </select>
                                <div class="form-group">
                                    <label >Hien thi</label>
                                <select name="product_status"class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                                </select>
                                </div>

                                     
                                <button type="submit" name="update_product" class="btn btn-info">Cap nhat san pham</button>
                            </form>
                            </div>
                             @endforeach
                        </div>
                    </section>

            </div>
@endsection           