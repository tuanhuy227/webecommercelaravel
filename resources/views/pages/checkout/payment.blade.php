@extends('layout')
@section ('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Thanh toan gio hang </li>
            </ol>
        </div><!--/breadcrums-->
          
       
        <!--/checkout-options-->

       

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">
                            <form action="{{URL::to('/save_checkout_customer')}}" method="POST">
                                {{csrf_field()}}
                                <input name="shipping_email"type="text" placeholder="Email*">
                                
                                
                                
                                <input name="shipping_name"type="text" placeholder="Tên ">
                               
                                <input name="shipping_address" type="text" placeholder="Địa chỉ">
                                <input name="shipping_phone" type="text" placeholder="Điện thoại">
                                <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng" rows="16"></textarea>
                                <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                       
                    </div>
                </div>
                				
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <?php
            $content = Cart::content();
            
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sp</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="90" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update_cart_quantity')}}" method="POST">
                                {{ csrf_field() }}
                                <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                
                                <?php
                                $subtotal = $v_content->price * $v_content->qty;
                                echo number_format($subtotal).' '.'vnđ';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete_to_cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
        <h4 >Chọn hình thức thanh toán</h4>
        
        <form  style="clear: both; "  method="POST" action="{{URL::to('/order_place')}}">
            {{csrf_field()}}
        <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option"  value="2 " type="checkbox"> Nhận tiền mặt </label>
                </span>
                <span>
                    <label><input name="payment_option"  value="3 " type="checkbox"> Thẻ ghi nợ </label>
                </span>
                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
            </div>
            
        </form>
    </div>

</section> <!--/#cart_items-->

@endsection