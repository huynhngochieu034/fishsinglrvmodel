 @extends('welcome')
 @section('content')

<section id="cart_items">
		<div class="container container-responsive">

			<!-- <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div> -->
			<h2 class="title text-center">Giỏ hàng</h2>
			<div class="table-responsive cart_info">

				@if(Session::has('flash_message_success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>{!! session('flash_message_success') !!}</strong>
				</div>
				@endif
				@if(Session::has('flash_message_error'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>{!! session('flash_message_error') !!}</strong>
				</div>
				@endif
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td>Xóa</td>
						</tr>
					</thead>
					<tbody>
						<?php  $total_amount = 0; ?>
						@foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<img height="100" width="100" src="{{URL::to('/public/uploads/product/'.$cart->image)}}" alt="">
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $cart->product_name }}</a></h4>
								<p>Mã ID:{{ $cart->product_id }} </p>
							</td>
							<td class="cart_price">
								<p>{{number_format($cart->price).'  VNĐ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{URL::to('/cart/update-quality/'.$cart->cart_id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quality" value="{{ $cart->quality }}" autocomplete="off" size="2">
									@if($cart->quality > 1)
									<a class="cart_quantity_down" href="{{URL::to('/cart/update-quality/'.$cart->cart_id.'/-1')}}"> - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($cart->price * $cart->quality).'  VNĐ'}}</p>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('Bạn muốn xóa sản phẩm này?')" class="cart_quantity_delete" href="{{ URL::to('/cart/delete-product/'.$cart->cart_id) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quality); ?>
						@endforeach
						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div> -->
			<!-- <div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li class="p-3 mb-2 bg-light text-dark">Tổng Cộng: <span><?php echo number_format($total_amount).'  VNĐ'; ?></span></li>
						</ul>
						<a class="btn btn-default check_out" href="{{URL::to('/update-cart-status')}}">Đặt hàng</a>
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

 @endsection 
