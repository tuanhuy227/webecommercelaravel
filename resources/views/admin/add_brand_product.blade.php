@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Them thuong hieu san pham
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
                                <form role="form"action="{{URL::to('save_brand_product')}} " method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Ten thuong hieu</label>
                                    <input type="text" name="brand_product_name" class="form-control"  placeholder="Ten thuong hieu">
                                </div>
                                <div class="form-group">
                                    <label >Mo ta thuong hieu</label>
                                    <textarea style="resize:none " row="8"   name="brand_product_desc"class="form-control"  placeholder="Mo ta thuong hieu">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Hien thi</label>
                                <select name="brand_product_status"class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                                </select>
                                </div>

                                     
                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thuong hieu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection           