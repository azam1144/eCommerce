
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
<div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'  style="font-size: 15px">
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center;font-size: 15px; font-weight:700" >
                        Review Your Order & Complete Checkout
                    </h2>
                    <hr/>
                    <div class="shopping_cart">
                        <form class="form-horizontal" role="form" action="" method="post" id="payment-form">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Review
                                                Your Order</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="items">
                                                <div class="col-md-9">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li><img src="{{ asset('images/'.$product->images[0]->name) }}" alt=" " class="img-responsive" style="width: 43px;height: 39px; border: 1px solid #d6d4d4; padding: 4px;"/></li>
                                                                    <li>{{$product->title}}</li>
                                                                    <li>
                                                                        <div class="simpleCart_shelfItem">
                                                                            <p><span>${{$product->price}}</span> <i class="item_price">${{$product->discount}}</i></p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-3">
                                                    <div style="text-align: center;">
                                                        <h3>Order Total</h3>
                                                        <h3><span style="color:green;">${{$product->discount}}</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-group">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <b>Help us keep your account safe and secure, please verify your billing
                                            information.</b>
                                        <br/><br/>
                                        <table class="table table-striped" style="font-weight: bold;">
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Best Email:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_email" name="email"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_first_name">First name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_first_name" name="first_name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_last_name">Last name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_last_name" name="last_name"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_address_line_1"
                                                           name="address_line_1" required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_2">Unit / Suite #:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_address_line_2"
                                                           name="address_line_2" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="AK">Bahrain </option>
                                                        <option value="AL">Iraq</option>
                                                        <option value="AZ">Kuwait</option>
                                                        <option value="AR">Oman</option>
                                                        <option value="CA">Qatar</option>
                                                        <option value="CO">Saudi Arabia</option>
                                                        <option value="CT">United Arab Emirates</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_postalcode">Postalcode:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_postalcode" name="postalcode"
                                                           required="required" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-group">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            <legend style="font-size: 15px">What method would you like to pay with today?</legend>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-holder-name" style="font-size: 13px">Name on Card</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" stripe-data="name" id="name-on-card" placeholder="Card Holder's Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="card-number" style="font-size: 13px">Card Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" stripe-data="number" id="card-number" placeholder="Debit/Credit Card Number">
                                                    <br/>
                                                    <div><img class="pull-right" src="https://s3.amazonaws.com/hiresnetwork/imgs/cc.png" style="max-width: 250px; padding-bottom: 20px;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="expiry-month" style="font-size: 13px">Expiration Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <select class="form-control col-sm-2"
                                                                        data-stripe="exp-month" id="card-exp-month"
                                                                        style="margin-left:5px;">
                                                                    <option>Month</option>
                                                                    <option value="01">Jan (01)</option>
                                                                    <option value="02">Feb (02)</option>
                                                                    <option value="03">Mar (03)</option>
                                                                    <option value="04">Apr (04)</option>
                                                                    <option value="05">May (05)</option>
                                                                    <option value="06">June (06)</option>
                                                                    <option value="07">July (07)</option>
                                                                    <option value="08">Aug (08)</option>
                                                                    <option value="09">Sep (09)</option>
                                                                    <option value="10">Oct (10)</option>
                                                                    <option value="11">Nov (11)</option>
                                                                    <option value="12">Dec (12)</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <select class="form-control" data-stripe="exp-year"
                                                                        id="card-exp-year">
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="cvv" style="font-size: 13px">Card CVC</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" stripe-data="cvc"
                                                               id="card-cvc" placeholder="Security Code">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Place Order</button>
                                        <br/>
                                        <div style="text-align: left;"><br/>
                                            By submiting this order you are agreeing to our <a href="/legal/billing/">universal
                                                billing agreement</a>, and <a href="/legal/terms/">terms of service</a>.
                                            If you have any questions about our products or services please contact us
                                            before placing this order.
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
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
