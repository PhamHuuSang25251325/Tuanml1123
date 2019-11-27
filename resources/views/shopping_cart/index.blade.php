@extends('layouts.app')

@section('content')

	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(landing/images/heading-pages-01.jpeg);">
		<h2 class="l-text2 t-center">
			Giỏ Hàng
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<form action="{{route('cart.update')}}" method="post">
			@csrf
				<!-- Cart item -->
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
					
							<table class="table-shopping-cart">
								<tr class="table-head">
									<th class="column-1"></th>
									<th class="column-2">Product</th>
									<th class="column-3">Price</th>
									<th class="column-4 p-l-70">Quantity</th>
									<th width="12%" class="column-5">Total</th>
								</tr>
								@if(Cart::count()>0)
								@foreach(Cart::content() as $item)
								<tr class="table-row">
									<td class="column-1">
										<a href="{{route('cart.remove.item',$item->rowId)}}">
										<div class="cart-img-product b-rad-4 o-f-hidden">
											<img src="{{parse_url_file($item->options->avatar)}}" alt="IMG-PRODUCT">
										</div>
										</a>
									</td>
									<td class="column-2">{{$item->name}}</td>
									<td class="column-3">{{number_format($item->price ,0 ,'.' ,'.').' đ'}}</td>
									<td class="column-4">
										<div class="flex-w bo5 of-hidden w-size17">
											<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
											</button>

											<input class="size8 m-text18 t-center num-product" type="number" name="{{$item->rowId}}" value="{{$item->qty}}">

											<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
												<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
											</button>
										</div>
									</td>
									<td class="column-5">{{number_format($item->qty*$item->price ,0 ,'.' ,'.').' đ'}}</td>
								</tr>
								@endforeach
								@endif
							</table>
						
					</div>
				</div>

				<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
					<div class="flex-w flex-m w-full-sm">
						<div class="size11 bo4 m-r-10">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Mã giảm giá">
						</div>

						<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
							<!-- Button -->
							<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Áp dụng
							</button>
						</div>
					</div>

					<div class="size10 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" type="submit">
							Update Giỏ Hàng
						</button>
					</div>
				</div>

				<!-- Total -->
				<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Total:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
						{{Cart::subtotal()}}
						</span>
					</div>

					<div class="size15 trans-0-4">
						<!-- Button -->
						<a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href={{route('cart.checkout')}}>
							Thanh Toán
						</a>
					</div>
				</div>
			</form>
		</div>
	</section>
   

@stop

@section('footerJS')
	<script>
		toastr.options={
			progressBar :  true,
		}
		@if (Session::has('message'))
			toastr.info("{{Session::get('message')[0]}}",'Thông báo');
		@endif
	</script>
@stop