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
                                <li><a href="#"><i class="fa fa-phone"></i> 035.74.79.762</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Cacanhpro@gmail.com</a></li>
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
                                    
                                </li>  -->VBV 
                                <li><a href="{{URL::to('/cart')}}">Giỏ hàng</a></li>
                                <li><a href="{{URL::to('/guide')}}">Chăm sóc</a></li>
                                <li><a href="{{URL::to('/introduce')}}">Giới thiệu</a></li>
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

	<section id="form" style="margin-top: 20px"><!--form-->

		<div class="container">
			<div class="row">
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
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Cập nhật tài khoản</h2>
						<form id="accountForm" name="accountForm" action="{{URL::to('/account')}}" method="post">
                            {{ csrf_field() }}
							<input value="{{ $userDetails->name }}" id="name" name="name" type="text" placeholder="Tên" required />
                            <input value="{{ $userDetails->phone }}" id="phone" name="phone" type="text" placeholder="Số điện thoại" required />
                            <input value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Địa chỉ" required />
							<!-- <span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ
							</span> -->
							<button type="submit" class="btn btn-default">Cập nhật</button>
						</form>
					</div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">

					<div class="signup-form">
						<h2>Thay đổi mật khẩu!</h2>
						<form id="passwordForm"  name="passwordForm" action="{{URL::to('/update-user-pwd')}}" method="post">
							{{ csrf_field() }}
                            <input id="current_pwd" name="current_pwd" type="password" placeholder="Mật khẩu cũ" required/>
                            <span id="chkPwd" ></span>
                            <input id="new_pwd" name="new_pwd" type="password" placeholder="Mật khẩu mới" onKeyUp="checkPasswordStrength();" required/>
                            <div id="password-strength-status"></div>

							<input id="confirm_pwd" name="confirm_pwd" type="password" placeholder="Nhập lại mật khẩu mới" required/>
                            <span id='message'></span>
							<button id="myBtn" type="submit" class="btn btn-default">Thay đổi mật khẩu</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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

    <script type="text/javascript">

    	$(document).ready(function(){
    	

  

    $("#current_pwd").keyup(function(){
        var current_pwd = $(this).val();
        $.ajax({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            type:'post',
            url:'/fishsinglrvmodel/check-user-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#chkPwd").html("<font color='red'>Mật khẩu hiện tại không đúng</font>");
                    document.getElementById("myBtn").disabled = true;
                }else if(resp == "true"){
                    $("#chkPwd").html("<font color='green'>Mật khẩu OKE!</font>");
                    document.getElementById("myBtn").disabled = false;
                }
                //alert(resp);
            },error:function(){
               console.log('error');
            }
        });
    });

$('#new_pwd, #confirm_pwd').keyup(function(){
    document.getElementById("myBtn").disabled = true;
  if ($('#new_pwd').val() == $('#confirm_pwd').val()) {
    $('#message').html('Mật khẩu khớp').css('color', 'green');
    document.getElementById("myBtn").disabled = false;
  } else 
    $('#message').html('Mật khẩu không khớp').css('color', 'red');
});
    		
   });
function checkPasswordStrength() {
	var number = /([0-9])/;
	var alphabets = /([a-zA-Z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	
	if($('#new_pwd').val().length<8) {
		$('#password-strength-status').removeClass();
		$('#password-strength-status').addClass('weak-password');
		$('#password-strength-status').html("Yếu (Nhỏ hơn 8 kí tự.)");
        
	} else {  	
	    if($('#new_pwd').val().match(number) && $('#new_pwd').val().match(alphabets) && $('#new_pwd').val().match(special_characters)) {            
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('strong-password');
			$('#password-strength-status').html("Mạnh");
            
        } else {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('medium-password');
			$('#password-strength-status').html("Trung bình (bao gồm chữ, số và kí tự đặc biệt.)");
             
        } 
	}
}



    </script>

</body>
</html>