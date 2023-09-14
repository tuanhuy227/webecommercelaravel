@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cap nhat danh muc san pham
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                      ?>
                        <div class="panel-body">
                            @foreach ($edit_category_product as $key=>$edit_value)
                                
                           
                            <div class="position-center">
                                <form role="form"action="{{URL::to('update_category_product/'.$edit_value->category_id)}} " method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Ten danh muc</label>
                                    <input type="text" name="category_product_name" class="form-control" value="{{$edit_value->category_name}}" placeholder="Ten danh muc">
                                </div>
                                <div class="form-group">
                                    <label >Mo ta danh muc</label>
                                    <textarea style="resize:none " row="8"   name="category_product_desc"class="form-control" value="{{$edit_value->category_desc}}"  placeholder="Mo ta danh muc">
                                    </textarea>
                                </div>
                                

                                     
                                <button type="submit" name="update_category_product" class="btn btn-info">Cap nhat danh mục</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection           