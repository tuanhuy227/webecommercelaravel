@extends('layout')
@section ('content')
@foreach($product_detail as $key=> $value)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                      <a href=""><img src="{{URL::to('/public/frontend/images/similar3.jpg')}}" alt=""></a>
                    </div>
                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->product_name}}</h2>
            <p>Ma ID: {{$value->product_id}}</p>
            <img src="images/product-details/rating.png" alt="" />
            <form action="{{URL::to('/save_cart')}}" method="POST">
                {{csrf_field()}}
            <span>
                <span>{{number_format($value->product_price).'VND'}}</span>
                <label>Quantity:</label>
                <input type="number" name="quantity"  min="1" value="1" />
                <input type="hidden" name="productid_hidden"  min="1" value="{{$value->product_id}}" />
                <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                   Them gio hang
                </button>
            </span>
            <p><b>Tinh trang:</b> Con hang</p>
            <p><b>Dieu kien:</b> Moi</p>
            <p><b>Brand:</b> {{$value->brand_name}}</p>
            <p><b>Danh muc:</b> {{$value->category_name}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div>

    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mo ta</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiet san pham</a></li>
                
                <li ><a href="#reviews" data-toggle="tab">Danh gia </a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in " id="details" >
                
                    <p><b>{{$value->product_desc}}</b></p>
            </div>
            
            <div class="tab-pane fade" id="companyprofile" >
                <p><b>{{$value->product_content}}</b></p>
                
            </div>
            
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    
                    
                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name"/>
                            <input type="email" placeholder="Email Address"/>
                        </span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
        </div>

    </div><!--/category-tab-->
@endforeach    
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">San pham lien quan</h2>
        
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">	
                    @foreach($relate as $key=>$lienquan)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">$
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to('public/uploads/product/'. $lienquan ->product_image)}}" alt="" />
                                    <h2>{{number_format($lienquan->product_price).'VND'}}</h2>
                                    <p>{{$lienquan->product_name}}</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
               
            </div>
            
             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>			
        </div>
        
    </div><!--/recommended_items-->
 @endsection   
