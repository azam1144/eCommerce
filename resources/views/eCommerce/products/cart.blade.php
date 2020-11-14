
<!-- layout -->
@extends('eCommerce.layouts.layout')
<!-- //layout -->

<!-- header -->
@section('women-fashion-header')
    @extends('eCommerce.headers.women-fashion-header')
@endsection
<!-- //header -->

<!-- banner -->
@section('checkout-banner')
    @extends('eCommerce.banners.checkout-banner')
@endsection
<!-- //banner -->

<!-- breadcrumbs -->
@section('breadcrumbs')
    @extends('eCommerce.breadcrumbs.breadcrumbs-checkout')
@endsection
<!-- //breadcrumbs -->

<!-- content -->
@section('content')
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h3>Your shopping cart contains: <span>1 Products</span></h3>

			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Service Charges</th>
							<th>Price</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tr class="rem1">
						<td class="invert">1</td>
						<td class="invert-image"><a href="#single.html"><img src="{{ asset('images/'.$product->images[0]->name) }}" alt=" " class="img-responsive" /></a></td>

                        <td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>1</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">{{$product->title}}</td>
						<td class="invert">$5.00</td>
						<td class="invert">{{$product->discount}}</td>
						<td class="invert">
							<div class="rem">
								<div class="close1"> </div>
							</div>
						</td>
					</tr>
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<li>{{$product->title}} <i>-</i> <span>{{$product->discount}} </span></li>
						<li>Total Service Charges <i>-</i> <span>$5.00</span></li>
						<li>Total <i>-</i> <span>{{$product->discount + 5}}</span></li>
					</ul>
				</div>
				<div class="checkout-right-basket">
					<a href="{{ route('products.index') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">
                @foreach($products as $product)
                    <li>
                        <div class="w3l_related_products_grid">
                            <div class="agile_ecommerce_tab_left dresses_grid">
                                <div class="hs-wrapper hs-wrapper3">
                                    @foreach($product->images as $image)
                                        <img src="{{ asset('images/'.$image->name) }}" alt=" " class="img-responsive" />
                                    @endforeach
                                    <div class="w3_hs_bottom">
                                        <div class="flex_ecommerce">
                                            <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <h5><a href="#">{{$product->title}}</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p class="flexisel_ecommerce_cart"><span>${{$product->price}}</span> <i class="item_price">${{$product->discount}}</i></p>
                                    <p><a class="item_add" href="#">Add to cart</a></p>
                                </div>
                                <div class="dresses_grid_pos">
                                    <h6>New</h6>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
			</ul>
		</div>
	</div>
	<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="{{ asset('images/39.jpg') }}" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>a good look women's Long Skirt</h4>
							<p>Ut enim ad minim veniam, quis nostrud
								exercitation ullamco laboris nisi ut aliquip ex ea
								commodo consequat.Duis aute irure dolor in
								reprehenderit in voluptate velit esse cillum dolore
								eu fugiat nulla pariatur. Excepteur sint occaecat
								cupidatat non proident, sunt in culpa qui officia
								deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="{{ asset('images/star-.png') }}" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="{{ asset('images/star.png') }}" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="{{ asset('images/star.png') }}" alt=" " class="img-responsive" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$320</span> <i class="item_price">$250</i></p>
								<p><a class="item_add" href="#">Add to cart</a></p>
							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span>Red</a></li>
									<li><a href="#" class="brown"><span></span>Yellow</a></li>
									<li><a href="#" class="purple"><span></span>Purple</a></li>
									<li><a href="#" class="gray"><span></span>Violet</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //checkout -->
@endsection



<!-- footer -->
@section('footer')
    @extends('eCommerce.layouts.footer')
@endsection
<!-- //footer -->

@section('javascript')
    @parent
    <script src="{{ asset('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo2").flexisel({
                visibleItems:4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems:2
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });
        $(document).ready(function(c) {
            $('.close1').on('click', function(c){
                $('.rem1').fadeOut('slow', function(c){
                    $('.rem1').remove();
                });
            });

            $('.close2').on('click', function(c){
                $('.rem2').fadeOut('slow', function(c){
                    $('.rem2').remove();
                });
            });

            $('.close3').on('click', function(c){
                $('.rem3').fadeOut('slow', function(c){
                    $('.rem3').remove();
                });
            });

            $('.value-plus').on('click', function(){
                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                divUpd.text(newVal);
            });

            $('.value-minus').on('click', function(){
                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                if(newVal>=1) divUpd.text(newVal);
            });
        });
    </script>
@endsection
