@extends('layouts.app')

@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(landing/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Sản Phẩm
		</h2>
		<p class="m-text13 t-center">
			Sản phẩm làm đẹp
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Danh mục
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="/product/action/?page={{$products->currentPage()}}&category_id=" class="s-text13 active1 js-cat">
									Tất cả sản phẩm
								</a>
							</li>
							@if(isset($categories))
								@foreach($categories as $cat)
								<li class="p-t-4">
								<a href="#" data-id="{{$cat->id}}" class="s-text13 active1 js-cat">
									{{$cat->cat_name}}
								</a>
							</li>
								@endforeach
							@endif
							
						</ul>
						
						<div class="search-product pos-relative bo4 of-hidden">
							<form action="">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" id="keyword" placeholder="tìm sản phẩm..." value="{{\Request::get('keyword')}}">

								<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="button" id="btnSearch" >
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
									<select class="form-control" style="font-size: 13px" id="js-select" name="orderBy">
										<option value="">Sắp xếp</option>
										<option value="">Nhiều người mua</option>
										<option value="+price">Giá: Tăng dần</option>
										<option value="-price">Giá: Giảm dần</option>
									</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–{{$products->count()}} of {{$products->total()}} Sản phẩm
						</span>
					</div>

					<!-- Product -->
					
					<div class="row" id="listProduct">
					
					@if($products->count()>0)
						@foreach($products as $pro)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="{{parse_url_file($pro->pro_avatar)}}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="{{route('cart.add.item',$pro->id)}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 js-add-cart">
												Thêm vào giỏ
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="{{route('product.detail',$pro)}}" class="block2-name dis-block s-text3 p-b-5">
										{{$pro->pro_name}}
									</a>

									<span class="block2-price m-text6 p-r-5">
									{{number_format($pro->price ,0 ,'.' ,'.').' đ'}}
									</span>
								</div>
							</div>
						</div>

						@endforeach
					@else
					<div class="col-sm-12">
						<p>Không tìm thấy sản phẩm nào</p>
					</div>
					@endif
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						@if($products->lastPage()>1)
							@for($i=1; $i<=$products->lastPage(); $i++)
							<a href="?page={{$i}}" class="item-pagination flex-c-m trans-0-4 {{$i==$products->currentPage()? 'active-pagination' : ''}} ">{{$i}}</a>
							@endfor
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

@stop

@section('footerJS')
  <script>
    $(function(){
		toastr.options={
			progressBar :  true,
			timeOut: "1000",
		}
		let category_id='';
        let orderBy='';
      $('#js-select').on('change',function(e){
		e.preventDefault();
		let optionSelected = $(this).find("option:selected");
		orderBy  = optionSelected.val();
		$.ajax({
			url: 'product/action',
			method: 'get',
			data : {
				orderBy: orderBy,
				category_id : category_id
			}
		}).done(function(res){
			$('#listProduct').html('').append(res);
		})
	  })
	  $('.js-cat').click(function(e){
		e.preventDefault();
		category_id = $(this).attr('data-id');
		$.ajax({
				url: 'product/action',
				method: 'get',
				data : {
					orderBy: orderBy,
					category_id : category_id
				}
			}).done(function(res){
				$('#listProduct').html('').append(res);
				})
      })
	  $('.js-add-cart').click(function(e){
            e.preventDefault();
            let url=$(this).attr('href');
            $.ajax({
                url : url
            }).done(function(res){
                if(res){
                     $('#cart-content').html('').append(res);
					 toastr.success('Đã thêm vào giỏ hàng')
                }
               
            })
		})
		$('#btnSearch').click(function(){
			let keyword=$('#keyword').val();
			$.ajax({
				url: '/product/action',
				method : 'get',
				data : {
					keyword: keyword
				}
			}).done(function(res){
				if(res){
					$('#listProduct').html('').append(res);
				}
			})			
		})
    })
  </script>
@stop
