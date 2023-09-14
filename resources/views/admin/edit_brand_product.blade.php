@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cap nhat thuong hieu san pham
                        </header>
                        <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                      ?>
                        <div class="panel-body">
                            @foreach ($edit_brand_product as $key=>$edit_value)
                                
                           
                            <div class="position-center">
                                <form role="form"action="{{URL::to('update_brand_product/'.$edit_value->brand_id)}} " method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label >Ten thuong hieu</label>
                                    <input type="text" name="brand_product_name" class="form-control" value="{{$edit_value->brand_name}}" placeholder="Ten thuong hieu">
                                </div>
                                <div class="form-group">
                                    <label >Mo ta thuong hieu</label>
                                    <textarea style="resize:none " row="8"   name="brand_product_desc"class="form-control" value="{{$edit_value->brand_desc}}"  placeholder="Mo ta thuong hieu">
                                    </textarea>
                                </div>
                                

                                     
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cap nhat thuong hieu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection           