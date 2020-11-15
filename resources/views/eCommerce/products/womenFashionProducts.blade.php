
<!-- layout -->
    @extends('eCommerce.layouts.layout')
<!-- //layout -->

<!-- header -->
@section('women-fashion-header')
    @extends('eCommerce.headers.women-fashion-header')
@endsection
<!-- //header -->

<!-- banner -->
@section('women-fashion-banner')
    @extends('eCommerce.banners.women-fashion-banner')
@endsection
<!-- //banner -->

<!-- breadcrumbs -->
@section('breadcrumbs')
    @extends('eCommerce.breadcrumbs.breadcrumbs-women-fashion')
@endsection
<!-- //breadcrumbs -->

<!-- content -->
@section('content')
    <div class="dresses">
        <div class="container">
            <div class="w3ls_dresses_grids">
                <div class="col-md-4 w3ls_dresses_grid_left">
                    <div class="w3ls_dresses_grid_left_grid">
                        <h3>Categories</h3>
                        <div class="w3ls_dresses_grid_left_grid_sub">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h4 class="panel-title asd">
                                    <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>New Arrivals
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body panel_text">
                                    <ul>
                                        <li><a href="#">Dresses</a></li>
                                        <li><a href="#">Sweaters</a></li>
                                        <li><a href="#">Shorts & Skirts</a></li>
                                        <li><a href="#">Jeans</a></li>
                                        <li><a href="#">Shirts</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                  <h4 class="panel-title asd">
                                    <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Foot Wear
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                   <div class="panel-body panel_text">
                                    <ul>
                                        <li><a href="#">Flats</a></li>
                                        <li><a href="#">Sandals</a></li>
                                        <li><a href="#">Boots</a></li>
                                        <li><a href="#">Heals</a></li>
                                        <li><a href="#">Shirts</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <ul class="panel_bottom">
                                <li><a href="#">Summer Store</a></li>
                                <li><a href="#">New In Clothing</a></li>
                                <li><a href="#">New In Shoes</a></li>
                                <li><a href="#">Latest Watches</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w3ls_dresses_grid_left_grid">
                        <h3>Color</h3>
                        <div class="w3ls_dresses_grid_left_grid_sub">
                            <div class="ecommerce_color">
                                <ul>
                                    <li><a href="#"><i></i> Red(5)</a></li>
                                    <li><a href="#"><i></i> Brown(2)</a></li>
                                    <li><a href="#"><i></i> Yellow(3)</a></li>
                                    <li><a href="#"><i></i> Violet(6)</a></li>
                                    <li><a href="#"><i></i> Orange(2)</a></li>
                                    <li><a href="#"><i></i> Blue(1)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w3ls_dresses_grid_left_grid">
                        <h3>Size</h3>
                        <div class="w3ls_dresses_grid_left_grid_sub">
                            <div class="ecommerce_color ecommerce_size">
                                <ul>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 w3ls_dresses_grid_right">
                    <div class="col-md-6 w3ls_dresses_grid_right_left">
                        <div class="w3ls_dresses_grid_right_grid1">
                            <img src="{{ asset('images/72.jpg') }}" alt=" " class="img-responsive" />
                            <div class="w3ls_dresses_grid_right_grid1_pos1">
                                <h3>Cosmetics <span>Up To</span> 10% Discount</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 w3ls_dresses_grid_right_left">
                        <div class="w3ls_dresses_grid_right_grid1">
                            <img src="{{ asset('images/73.jpg') }}" alt=" " class="img-responsive" />
                            <div class="w3ls_dresses_grid_right_grid1_pos">
                                <h3>Cosmetics <span>Makeup</span> Brush</h3>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>

                    <div class="w3ls_dresses_grid_right_grid2">
                        <div class="w3ls_dresses_grid_right_grid2_left">
                            <h3>Showing Results: 0-1</h3>
                        </div>
                        <div class="w3ls_dresses_grid_right_grid2_right">
                            <select name="select_item" class="select_item">
                                <option selected="selected">Default sorting</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                                <option>Sort by price: low to high</option>
                                <option>Sort by price: high to low</option>
                            </select>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="w3ls_dresses_grid_right_grid3">
                        @foreach($products as $product)
                            <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                                <div class="agile_ecommerce_tab_left dresses_grid">
                                    <div class="hs-wrapper hs-wrapper2">
                                        @foreach($product->images as $image)
                                            <img src="{{ asset('images/'.$image->name) }}" alt=" " class="img-responsive" />
                                        @endforeach

                                        <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                            <ul>
                                                <li>
                                                    <a href="#" data-toggle="modal" onClick="previewProduct({{$product}})" data-target="#myModal9"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5><a href="#">{{$product->title}}</a></h5>
                                    <div class="simpleCart_shelfItem">
                                        <p><span>${{$product->price}}</span> <i class="item_price">${{$product->discount}}</i></p>
                                    </div>
                                    <div class="dresses_grid_pos">
                                        <h6>New</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"> </div>
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
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="modal video-modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModal9">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <section>
                    <div class="modal-body">
                        <div class="col-md-5 modal_body_left">
                            <img src="{{ asset('images/76.jpg') }}" alt=" " class="img-responsive product-image" />
                        </div>
                        <div class="col-md-7 modal_body_right">
                            <h4 class="product-title">For Skin Care</h4>
                            <p class="product-descriptions">Ut enim ad minim veniam, quis nostrud
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
                                <p><span class="product-price">$320</span> <i class="item_price">$250</i></p>
                                {{--<p><a class="item_add" href="#">Add to cart</a></p>--}}
                                <p><a class="checkout-btn" href="#">Checkout</a></p>
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
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
<!-- //content -->

<!-- footer -->
@section('footer')
    @extends('eCommerce.layouts.footer')
@endsection
<!-- //footer -->

@section('javascript')
    @parent
    <script type="text/javascript">

        function previewProduct (product) {
            console.log('clicked 3 - product: ', product);
            let base_url = $('meta[name="base_url"]').attr('content');
            let imageUrl = base_url+'/images/'+product.images[1].name;

            $(".product-title").text(product.title);
            $(".product-descriptions").text(product.content);
            $(".product-image").attr("src", imageUrl);
            $(".product-price").text(product.price);
            $(".item_price").text(product.discount);
            $(".checkout-btn").attr('href', 'products/checkout/'+product.id);
        }

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
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
@endsection
