<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | Fishsing</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <!-- <link rel="shortcut icon" href="{{('public/frontend/images/logo.jfif')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 35 74 79 762</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Huynhngochieu034@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/images/logo.jpg')}}" width="80" height="80" alt="" />PRO FISHSING</a>
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <!-- <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="#"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li> -->
                                @if(Session::has('admin_id'))
                                 <li><a href="{{URL::to('/history')}}"><i class="fa fa-history"></i>Lịch sử giao dịch</a></li>
                                 <li><a href="{{URL::to('/account')}}"><i class="fa fa-user"></i> Tài khoản</a></li>
                                <li><a href="{{URL::to('/user-logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                                @else
                                 <li><a href="{{URL::to('/login-register')}}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
               
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                               <!--  <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li> 
                                        <li><a href="checkout.html">Checkout</a></li> 
                                        <li><a href="cart.html">Cart</a></li> 
                                        <li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li>  -->
                                <!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    
                                </li>  -->
                                <li><a href="{{URL::to('/cart')}}">Giỏ hàng</a></li>
                                <li><a href="#">Giới thiệu</a></li>
                                <li><a href="#">Chăm sóc</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                       <!--  <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div> -->
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->


    <section id="cart_items">
		<div class="container container-responsive">

			<!-- <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div> -->
			<h2 class="text-center">Lịch sử giao dịch</h2>
			<div class="table-responsive">

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
						</tr>
					</thead>
					<tbody>
						@foreach($userCart as $cart)
						<tr>
							<td>
								<img height="50" width="50" src="{{URL::to('/public/uploads/product/'.$cart->image)}}" alt="">
							</td>
							<td>
								<h4><a href="">{{ $cart->product_name }}</a></h4>
								<p>Mã ID:{{ $cart->product_id }} </p>
							</td>
							<td>
								<p>{{number_format($cart->price).'  VNĐ'}}</p>
							</td>
							<td>
                 				<p>{{$cart->quality}}</p>
            				</td>
							<td>
								<p>{{number_format($cart->price * $cart->quality).'  VNĐ'}}</p>
							</td>
						</tr>
						@endforeach
						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	

	
	 <footer id="footer"><!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 FISHSING Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="#">PRO</a></span></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   
</body>
</html>