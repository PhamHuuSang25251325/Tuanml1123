@extends('layouts.app')
@section('content')
<div class="container">
      

      <div class="row mt-5 mb-10" style=" margin-bottom: 50px">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
          </h4>
          <ul class="list-group mb-3">
            @if(Cart::count()>0)
                @foreach(Cart::content() as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$item->name}}</h6>
                        <small class="text-muted">{{$item->qty}} x {{number_format($item->price , 0 ,'.' ,'.').' đ'}}</small>
                    </div>
                    <img class="image" style="width: 50px; height: 50px;" src="{{pare_url_file($item->options->avatar)}}" alt="IMG">
                </li>
                @endforeach
            @endif
         
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (VND)</span>
              <strong>{{Cart::subtotal()}}</strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Thông tin cá nhân</h4>
          <form class="needs-validation" action="" method="POST" >
            @csrf
            <div class="mb-3">
              <label for="username">Họ Tên</label>
              <div class="input-group">
                <input type="text" class="form-control" name="customer_name" placeholder="Họ tên" value={{get_data_user('web','name')}} required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="customer_email" placeholder="you@example.com" value={{get_data_user('web','email')}}>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Số điện thoại</label>
              <input type="text" class="form-control" name="customer_phone" placeholder="0969696969" required>
              <div class="invalid-feedback">
                Please enter your phone.
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="customer_address" placeholder="46 Nguyễn Văn Trỗi" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Ghi chú</label>
              <textarea name="note" class="form-control" rows="3">
              </textarea>  
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      
</div>
@stop