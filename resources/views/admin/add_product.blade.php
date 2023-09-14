@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Them  san pham
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                      ?>
                        <div class="panel-body">
                            
                            <div class="position-center">
                                <form role="form"action="{{URL::to('save_product')}} " method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Ten san pham </label>
                                    <input type="text" name="product_name" class="form-control"  placeholder="Ten san pham ">
                                </div>
                                <div class="form-group">
                                    <label >Hinh anh san pham</label>
                                    <input type="file" name="product_image" class="form-control"  placeholder="Hinh anh san pham ">
                                </div>
                                <div class="form-group">
                                    <label >Mo ta san pham</label>
                                    <textarea style="resize:none " row="8"   name="product_desc"class="form-control"  placeholder="Mo ta san pham ">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Noi dung san pham</label>
                                    <textarea style="resize:none " row="8"   name="product_content"class="form-control"  placeholder="Noi dung san pham ">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Gia san pham </label>
                                    <input type="text" name="product_price" class="form-control"  placeholder="Ten san pham ">
                                </div>
                                <div class="form-group">
                                    <label >Danh muc san pham</label>
                                <select name="product_cate"class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key=>$cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                    
                                    
                                    
                                </select>
                                <div class="form-group">
                                    <label >Thuong hieu san pham</label>
                                <select name="product_brand"class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key=>$brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                      
                                </select>
                                <div class="form-group">
                                    <label >Hien thi</label>
                                <select name="product_status"class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                                </select>
                                </div>

                                     
                                <button type="submit" name="add_product" class="btn btn-info">Thêm san pham</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection           