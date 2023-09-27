@extends('layout')
@section ('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toan</li>
				</ol>
			</div><!--/breadcrums-->


       
        <!--/checkout-options-->

        <div class="register-req">
            <p>Làm ơn đăng kí hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-5 clearfix">
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

        
        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->

@endsection