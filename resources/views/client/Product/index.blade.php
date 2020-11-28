@extends('client.layout')

@section('breadcrumb')
Sản Phẩm
@endsection

@section('title')
Sản Phẩm
@endsection
@section('content')

<section class="w3l-ecommerce-main">
	<div class="ecom-contenthny py-5">
		<div class="container py-lg-5">
			<h3 class="hny-title mb-0 text-center"><?php if(isset($searchName)) echo 'Kết quả tìm kiếm: <span>'.$searchName.'</span>'; else if(isset($category_name)) echo 'Sản Phẩm Thuộc Danh Mục <span>'.$category_name.'</span>';  else if(isset($brand_name)) echo 'Sản Phẩm Thuộc Thương Hiệu <span>'.$brand_name.'</span>'; else echo 'Tất Cả Sản Phẩm';  ?> </h3>
			
			<!-- /row-->
			<div class="ecom-products-grids row mt-lg-5 mt-3">
				<!-- Sản Phẩm -->
				@foreach($list_product ?? '' as $product)
				<div class="col-lg-3 col-6 product-incfhny mt-4">
					<div class="product-grid2 transmitv">
						<div class="product-image2">
							<a href="{{route('get-client-productDetail',$product->id)}}">
								<img class="pic-1 img-fluid" src="{{asset('uploads/product')}}/{{$product->image_1}}?{{Rand(1,1000)}}">
								<img class="pic-2 img-fluid" src="{{asset('uploads/product')}}/{{$product->image_2}}?{{Rand(1,1000)}}">
							</a>
							<!-- <ul class="social">
									<li><a href="chitiet.html" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>
									<br><br>

										<li><a href="" data-tip="Add to Cart"><span class="fa fa-shopping-bag"></span></a>
										</li>
							</ul> -->


							<div class="transmitv single-item">
								<form action="#" method="GET">
									<!-- <label id="sale">Sale</label> -->
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="transmitv_item" value="{{$product->name}}">
									<input type="hidden" name="amount" value="{{$product->out_price}}">
									<!-- <input type="hidden" name="discount" value="99000"> -->
									<input type="hidden" name="href" value="{{route('get-client-productDetail',$product->id)}}">
									<input type="hidden" name="id" value="{{$product->id}}">
																	
									<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
										Thêm vào giỏ hàng
									</button>
								</form>
							</div>
						</div>
						<div class="product-content">
							<h3 class="title"><a href="{{route('get-client-productDetail',$product->id)}}">{{$product->name}}</a></h3>
							<span class="price"><?php echo number_format($product->out_price); ?></span>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<span><?php try{ ?>{{ $list_product->render('paginate') }}<?php } catch(Exception $e) {} ?></span>
		</div>
		
	</div>

</section>

@endsection