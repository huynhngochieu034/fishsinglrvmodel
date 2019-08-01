 @extends('welcome')
 @section('content')

  <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        @foreach($all_product as $key => $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" height="150" width="100" alt="" />
                                            <h2>{{$product->product_name}}</h2>
                                            <p>{{number_format($product->product_price).'  VNĐ'}}</p>
                                             <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-success"><i class="fa fa-angle-double-right"></i></i> Xem chi tiết</a>
                                        </div>
                                       
                                </div>
                               <!--  <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                      @endforeach
                       
                        
                    </div><!--features_items-->
                    
           
                    
                  
                   
@endsection 