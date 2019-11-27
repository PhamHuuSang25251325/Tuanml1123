@extends('layouts.app')

@section('content')
		<!-- Title Page -->
		<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(landing/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Blog
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						@foreach($list as $item)
						<div class="item-blog p-b-80">
							<a href="#" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="{{parse_url_file($item->post_avatar)}}" alt="IMG-BLOG" style="width : 100px">
							</a>
							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a href="#" class="m-text24">
										{{$item->post_title}}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>
								</div>

								<p class="p-b-12">
									{{$item->description}}
								</p>

								<a href="#" class="s-text20">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>
						@endforeach
					</div>

				</div>

				
			</div>
		</div>
	</section>
@stop