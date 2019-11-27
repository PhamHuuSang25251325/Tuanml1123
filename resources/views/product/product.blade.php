<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="{{parse_url_file($pro->pro_avatar)}}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 js-cart" href="{{route('cart.add.item',$pro->id)}}">
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