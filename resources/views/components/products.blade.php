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

<script>
    $(function(){
        toastr.options={
			progressBar :  true,
            timeOut: "1000",
		}
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
    })
</script>