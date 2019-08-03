
 @extends('welcome')
 @section('content')
@foreach($details_product as $key => $value)
				@if(Session::has('flash_message_error'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>{!! session('flash_message_error') !!}</strong>
				</div>
				Session::put('flash_message_error',null);
				@endif
<div class="product-details"><!--product-details-->
	<h2 class="title text-center">Chi tiết sản phẩm</h2>
						<div class="col-sm-5">
							<div class="view-product">
								<img height="100" width="100" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								   <!--  <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div> -->

								  <!-- Controls -->
								<!--   <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a> -->
							</div>

						</div>
						<div class="col-sm-7">
							<form name="addtocartForm" id="addtocartForm" action="{{ URL::to('add-cart')}}" method="post">{{ csrf_field() }}
								<input type="hidden" name="product_id" value="{{$value->product_id}}">
								<input type="hidden" name="product_name" value="{{$value->product_name}}">
								<input type="hidden" name="price" value="{{$value->product_price}}">
								<input type="hidden" name="image" value="{{$value->product_image}}">

							<div class="product-information"><!--/product-information-->
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<span>
									<span>{{number_format($value->product_price).'  VNĐ'}}</span>
									@if($value->product_stock != 0)
									<label>Số lượng:</label>
									<input type="number" name="quality" max="{{$value->product_stock}}" value="1" min="1"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ
									</button>
									@endif

								</span>
								@if($value->product_stock != 0)
								<p><b>Tình trạng:</b> Còn hàng</p>

								@endif
								@if($value->product_stock == 0)
								<p><b>Tình trạng:</b> Hết hàng</p>
								@endif

								<p><b>Ship toàn quốc free</b>( Chuyển khoản gửi xe hoặc hàng không, mọi rủi ro trong quá trình vận chuyển bên bán chịu)</p>
								<p><b>Thương hiệu: </b>{{$value->brand_name}}</p>
								<p><b>Danh mục: </b>{{$value->category_name}}</p>
								
							</div><!--/product-information-->
							</form>
						</div>
						
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$value->product_desc!!}</p>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
							</div>
						</div>
					</div><!--/category-tab-->
@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach($related_product as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" height="150" width="100" alt="" />
                                            <h2>{{number_format($lienquan->product_price).'  VNĐ'}}</h2>
                                            <p>{{$lienquan->product_name}}</p>
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}" class="btn btn-success"><i class="fa fa-angle-double-right"></i>Xem chi tiết</a>
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