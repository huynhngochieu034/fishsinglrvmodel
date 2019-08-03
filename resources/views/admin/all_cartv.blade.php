@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Đơn hàng chưa giao
    </div>
<!--     <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> -->
    <div class="table-responsive">
                        <?php
                        $message = Session::get('messagesuccess');
                        if($message){
                        echo '<span class="text-success">'.$message.'</span>';
                        Session::put('messagesuccess',null);
                         }
                         ?>
                          <?php
                        $message = Session::get('messageerror');
                        if($message){
                        echo '<span class="text-danger">'.$message.'</span>';
                        Session::put('messageerror',null);
                         }
                         ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          <!--   <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Tên khách</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Giao hàng</th>
            <!-- <th style="width:30px;">Thao tác</th> -->
          </tr>
        </thead>
        <tbody>
          
           <!--  @foreach($all_cart as $key => $cartdata) -->
          <tr>
           <!--  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
           <!-- <td><img src="public/uploads/product/{{ $cartdata->image }}" height="100" width="100"></td> -->
           <td class="cart_description">
            <img src="public/uploads/product/{{ $cartdata->image }}" height="100" width="100">
                <h4><a href="">{{ $cartdata->product_name }}</a></h4>
                <p>Mã ID:{{ $cartdata->product_id }} </p>
            </td>
              <td class="cart_price">
                <p>{{number_format($cartdata->price).'  VNĐ'}}</p>
              </td>

             <td class="cart_quantity">
                 <p>{{$cartdata->quality}}</p>
            </td>

              <td class="cart_total">
                <p class="cart_total_price">{{number_format($cartdata->price * $cartdata->quality).'  VNĐ'}}</p>
              </td>

            <td>{{ $cartdata->name }}</td>
              <td>{{ $cartdata->phone }}</td>
            <td>{{ $cartdata->address }}</td>

            <td><span class="text-ellipsis">
                <?php
                     if($cartdata->status==1){
                ?>

                        <a href="{{URL::to('/unactive-cart/'.$cartdata->cart_id)}}"><span class="fa fa-thumbs-styling fa fa-thumbs-up">Đã giao hàng</span></a>
                         <?php
                     }
                     else{
                        ?>
                        <a href="{{URL::to('/active-cart/'.$cartdata->cart_id)}}"><span class="fa fa-thumbs-styling fa fa-thumbs-down">Chưa giao hàng</span></a>
                         <?php
                     }   
                ?>
          </span></td>
           
           
           <!--  <td>
              
                <a onclick="return confirm('Bạn muốn xóa đơn hàng này?')" href="{{URL::to('/delete-cart/'.$cartdata->cart_id)}}" class="active styling-edit" ui-toggle-class="">
                 <i class="fa fa-times text-danger text"></i></a> 
            </td> -->
          </tr>
         
         <!-- @endforeach -->

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

        @endsection