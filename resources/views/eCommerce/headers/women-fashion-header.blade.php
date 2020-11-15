<!-- header -->
	<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title" id="myModalLabel">
						Don't Wait, Login now!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Sign in</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Sign up</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
                                                <form id="loginForm" method="POST" action="{{ route('login') }}">
                                                    @csrf

                                                    <div>
                                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                                        <x-jet-input id="login-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                                    </div>

                                                    <div class="mt-4">
                                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                                        <x-jet-input id="login-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                                    </div>

                                                    <div class="block mt-4">
                                                        <label for="remember_me" class="flex items-center">
                                                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                        </label>
                                                    </div>

                                                    <div class="flex items-center justify-end mt-4">
                                                        @if (Route::has('password.request'))
                                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                                {{ __('Forgot your password?') }}
                                                            </a>
                                                        @endif
                                                    </div>
													<div class="sign-up">
														<input type="button" id="loginToUsers" class="btn btn-secondary" value="Sign in"/>
													</div>
												</form>
											</div>
										</div> 
									</div>	

									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
                                                <form id="registerForm" method="POST" action="{{ route('register') }}">
                                                    @csrf

                                                    <div>
                                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                                        <x-jet-input id="register-name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                    </div>

                                                    <div class="mt-4">
                                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                                        <x-jet-input id="register-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                                    </div>

                                                    <div class="mt-4">
                                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                                        <x-jet-input id="register-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                                    </div>

                                                    <div class="mt-4">
                                                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                                        <x-jet-input id="register-password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                                    </div>

                                                    <div class="sign-up">
                                                        <input type="button" id="registerToUsers" class="btn btn-secondary" value="Sign Up"/>
                                                    </div>
                                                </form>
											</div>
										</div>
									</div> 			        					            	      
								</div>	
							</div>
							<div id="OR" class="hidden-xs">
								OR</div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<h3 class="other-nw">
										Sign in with</h3>
								</div>
								<div class="col-md-12">
									<ul class="social">
										<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
										<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
										<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
										<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header">
		<div class="container">
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
			<div class="w3l_logo">
				<h1><a href={{ route('products.index') }}>Women's Fashion<span>For Fashion Lovers</span></a></h1>
			</div>
			<div class="search">
			</div>
			<div class="cart box_1">
				<a href="#">
					<div class="total">
					<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
					<img src="{{ asset('images/bag.png') }}" alt="" />
				</a>
				<p><a href="javascript:void(0);" class="">Empty Cart</a></p>
				<div class="clearfix"> </div>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#index.html">Home</a></li>
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle act" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Clothing</h6>
											<li><a href="#dresses.html">Dresses<span>New</span></a></li>
											<li><a href="#sweaters.html">Sweaters</a></li>
											<li><a href="#skirts.html">Shorts & Skirts</a></li>
											<li><a href="#jeans.html">Jeans</a></li>
											<li><a href="#shirts.html">Shirts & Tops<span>New</span></a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Ethnic Wear</h6>
											<li><a href="#salwars.html">Salwars</a></li>
											<li><a href="#sarees.html">Sarees<span>New</span></a></li>
											<li><a href="#products.html"><i>Summer Store</i></a></li>
										</ul>
									</div>
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Foot Wear</h6>
											<li><a href="#sandals.html">Flats</a></li>
											<li><a href="#sandals.html">Sandals</a></li>
											<li><a href="#sandals.html">Boots</a></li>
											<li><a href="#sandals.html">Heels</a></li>
										</ul>
									</div>
									<div class="col-sm-4">
										<div class="w3ls_products_pos">
											<h4>50%<i>Off/-</i></h4>
											<img src="{{ asset('images/1.jpg') }}" alt=" " class="img-responsive" />
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="#about.html">About Us</a></li>
						<li><a href="#short-codes.html">Short Codes</a></li>
						<li><a href="#mail.html">Mail Us</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<!-- //header -->

@section('javascript')
    @parent
    <script src="{{ asset('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>

    <script>
        $(function() {
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        })
    </script>
@endsection
