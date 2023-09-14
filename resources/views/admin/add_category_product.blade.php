@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Them danh muc san pham
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
                                <form role="form"action="{{URL::to('save_category_product')}} " method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Ten danh muc</label>
                                    <input type="text" name="category_product_name" class="form-control"  placeholder="Ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label >Mo ta danh muc</label>
                                    <textarea style="resize:none " row="8"   name="category_product_desc"class="form-control"  placeholder="Mo ta danh muc">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label >Hien thi</label>
                                <select name="category_product_status"class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                                </select>
                                </div>

                                     
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection           