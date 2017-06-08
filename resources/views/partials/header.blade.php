<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="cs-logo">
                    <div class="cs-media">
                        <figure><a href="#s"><img src="public/images/cs-logo.png" alt=""/></a></figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div class="cs-main-nav pull-right">
                    <nav class="main-navigation">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Cari Mobil</a></li>
                            <li><a href="#">Pasang Iklan</a>
                            <li><a href="#">Berita</a></li>
                            <li class="cs-user-option">
                                <div class="cs-login">
                                    @if(auth()->check())
                                        <div class="cs-login-dropdown"><a href="#"><i class="icon-user2"></i> {{auth()->user()->name}} <i
                                                        class="icon-chevron-down2"></i></a>
                                            <div class="cs-user-dropdown"><strong>Buat Iklan Baru</strong>
                                                @include('partials.dashboardmenu')
                                                <a class="btn-sign-out" href="{{route('logout')}}">Logout</a></div>
                                        </div>
                                    @else
                                        <a href="{{route('login')}}" class="cs-bgcolor btn-form" aria-hidden="true"><i
                                                    class="icon-plus"></i> Sell Car</a>
                                    @endif
                                </div>
                                <!--<div class="cs-wish-list"><a href="#"><i class=" icon-heart4"></i><span>0</span></a>
                                    <div class="wish-list-dropdown">
                                        <strong>Post a new Ad</strong>
                                        <ul>
                                            <li class="alert alert-dismissible  fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="assets/extra-images/single-banner-img-1.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cs-info">
                                                    <h6><a href="#">Desktop Application Developer Support</a></h6>
                                                    Added <span>Feb 8, 2016</span>
                                                </div>
                                            </li>
                                            <li class="alert alert-dismissible  fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="assets/extra-images/single-banner-img-2.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cs-info">
                                                    <h6><a href="#">Desktop Application Developer Support</a></h6>
                                                    Added <span>Feb 8, 2016</span>
                                                </div>
                                            </li>
                                            <li class="alert alert-dismissible  fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="assets/extra-images/single-banner-img-3.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cs-info">
                                                    <h6><a href="#">Desktop Application Developer Support</a></h6>
                                                    Added <span>Feb 8, 2016</span>
                                                </div>
                                            </li>
                                            <li class="alert alert-dismissible  fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="assets/extra-images/single-banner-img-1.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cs-info">
                                                    <h6><a href="#">Desktop Application Developer Support</a></h6>
                                                    Added <span>Feb 8, 2016</span>
                                                </div>
                                            </li>
                                            <li class="alert alert-dismissible  fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="assets/extra-images/single-banner-img-2.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cs-info">
                                                    <h6><a href="#">Desktop Application Developer Support</a></h6>
                                                    Added <span>Feb 8, 2016</span>
                                                </div>
                                            </li>
                                            <li class="alert alert-dismissible  fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="assets/extra-images/single-banner-img-3.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="cs-info">
                                                    <h6><a href="#">Desktop Application Developer Support</a></h6>
                                                    Added <span>Feb 8, 2016</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <a class="btn-view-all" href="#">View All</a>
                                    </div>
                                </div>-->
                            </li>
                        </ul>
                    </nav>
                    <div class="cs-user-option hidden-lg visible-sm visible-xs">
                        <div class="cs-login">
                            <div class="cs-login-dropdown"><a href="#"><i class="icon-user2"></i> Kaiser <i
                                            class="icon-chevron-down2"></i></a>
                                <div class="cs-user-dropdown"><strong>Post a new Ad</strong>
                                    <ul>
                                        <li><a href="#">General Setting<span class="cs-bgcolor">3</span></a></li>
                                        <li><a href="#">My Posted Cars <span class="cs-bgcolor">23</span></a></li>
                                        <li><a href="#">Post New Car</a></li>
                                        <li><a href="#">Shortlisted</a></li>
                                        <li><a href="#">Payment</a></li>
                                        <li><a href="#">Packages</a></li>
                                    </ul>
                                    <a class="btn-sign-out" href="#">Logout</a></div>
                            </div>
                            <a class="cs-bgcolor btn-form" data-toggle="modal" href="remote.html"
                               data-target="#user-sign-up-sm" aria-hidden="true"><i class="icon-plus"></i> Sell Car</a>
                            <!-- Modal -->
                            <div class="modal fade" id="user-sign-up-sm" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Create Account</h4>
                                            <div class="cs-login-form">
                                                <form>
                                                    <div class="input-holder">
                                                        <label for="cs-username11"> <strong>USERNAME</strong> <i
                                                                    class="icon-user-plus2"></i>
                                                            <input type="text" class="" id="cs-username11"
                                                                   placeholder="Type desired username">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <label for="cs-email11"> <strong>Email</strong> <i
                                                                    class="icon-envelope"></i>
                                                            <input type="email" class="" id="cs-email11"
                                                                   placeholder="Type desired username">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <label for="cs-login-password11"> <strong>Password</strong> <i
                                                                    class="icon-unlock40"></i>
                                                            <input type="password" id="cs-login-password11"
                                                                   placeholder="******">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <label for="cs-confirm-password11"> <strong>confirm
                                                                password</strong> <i class="icon-unlock40"></i>
                                                            <input type="password" id="cs-confirm-password11"
                                                                   placeholder="******">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <input class="cs-color csborder-color" type="submit"
                                                               value="Create Account">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><a data-dismiss="modal" data-target="#user-sign-in-sm"
                                                                     data-toggle="modal" href="javascript:;"
                                                                     aria-hidden="true">Already have account</a>
                                            <div class="cs-separator"><span>or</span></div>
                                            <div class="cs-user-social"><em>Signin with your Social Networks</em>
                                                <ul>
                                                    <li><a href="#" data-original-title="facebook"><i
                                                                    class="icon-facebook-f"></i>facebook</a></li>
                                                    <li><a href="#" data-original-title="twitter"><i
                                                                    class="icon-twitter4"></i>twitter</a></li>
                                                    <li><a href="#" data-original-title="google-plus"><i
                                                                    class="icon-google4"></i>google</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="user-sign-in-sm" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>User Sign in</h4>
                                            <div class="cs-login-form">
                                                <form>
                                                    <div class="input-holder">
                                                        <label for="cs-username-111"> <strong>USERNAME</strong> <i
                                                                    class="icon-user-plus2"></i>
                                                            <input type="text" class="" id="cs-username-111"
                                                                   placeholder="Type desired username">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <label for="cs-login-password-111"> <strong>Password</strong> <i
                                                                    class="icon-unlock40"></i>
                                                            <input type="password" id="cs-login-password-111"
                                                                   placeholder="******">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder"><a class="btn-forgot-pass"
                                                                                 data-dismiss="modal"
                                                                                 data-target="#user-forgot-pass-sm"
                                                                                 data-toggle="modal" href="javascript:;"
                                                                                 aria-hidden="true"><i
                                                                    class=" icon-question-circle"></i> Forgot password?</a>
                                                    </div>
                                                    <div class="input-holder">
                                                        <input class="cs-color csborder-color" type="submit"
                                                               value="SIGN IN">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="cs-separator"><span>or</span></div>
                                            <div class="cs-user-social"><em>Signin with your Social Networks</em>
                                                <ul>
                                                    <li><a href="#" data-original-title="facebook"><i
                                                                    class="icon-facebook-f"></i>facebook</a></li>
                                                    <li><a href="#" data-original-title="twitter"><i
                                                                    class="icon-twitter4"></i>twitter</a></li>
                                                    <li><a href="#" data-original-title="google-plus"><i
                                                                    class="icon-google4"></i>google</a></li>
                                                </ul>
                                            </div>
                                            <div class="cs-user-signup"><i class="icon-user-plus2"></i> <strong>Not a
                                                    Member yet? </strong> <a class="cs-color" data-dismiss="modal"
                                                                             data-target="#user-sign-up-sm"
                                                                             data-toggle="modal" href="javascript:;"
                                                                             aria-hidden="true">Signup Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="user-forgot-pass-sm" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Password Recovery</h4>
                                            <div class="cs-login-form">
                                                <form>
                                                    <div class="input-holder">
                                                        <label for="cs-email-111"> <strong>Email</strong> <i
                                                                    class="icon-envelope"></i>
                                                            <input type="email" class="" id="cs-email-111"
                                                                   placeholder="Type desired username">
                                                        </label>
                                                    </div>
                                                    <div class="input-holder">
                                                        <input class="cs-color csborder-color" type="submit"
                                                               value="Send">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="cs-user-signup"><i class="icon-user-plus2"></i> <strong>Not a
                                                    Member yet? </strong> <a href="javascript:;" data-toggle="modal"
                                                                             data-target="#user-sign-up-sm"
                                                                             data-dismiss="modal" class="cs-color"
                                                                             aria-hidden="true">Signup Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="cs-wish-list"><a href="#"><i class=" icon-heart4"></i><span>0</span></a>
                        <div class="wish-list-dropdown">
                            <strong>Post a new Ad</strong>
                            <ul>
                                <li class="alert alert-dismissible  fade in" role="alert">

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="cs-media">
                                        <a href="#">
                                            <img src="assets/extra-images/single-banner-img-1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Desktop Application Developer Support</a></h6>
                                        Added <span>Feb 8, 2016</span>
                                    </div>
                                </li>
                                <li class="alert alert-dismissible  fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="cs-media">
                                        <a href="#">
                                            <img src="assets/extra-images/single-banner-img-2.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Desktop Application Developer Support</a></h6>
                                        Added <span>Feb 8, 2016</span>
                                    </div>
                                </li>
                                <li class="alert alert-dismissible  fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="cs-media">
                                        <a href="#">
                                            <img src="assets/extra-images/single-banner-img-3.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Desktop Application Developer Support</a></h6>
                                        Added <span>Feb 8, 2016</span>
                                    </div>
                                </li>
                                <li class="alert alert-dismissible  fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="cs-media">
                                        <a href="#">
                                            <img src="assets/extra-images/single-banner-img-1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Desktop Application Developer Support</a></h6>
                                        Added <span>Feb 8, 2016</span>
                                    </div>
                                </li>
                                <li class="alert alert-dismissible  fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="cs-media">
                                        <a href="#">
                                            <img src="assets/extra-images/single-banner-img-2.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Desktop Application Developer Support</a></h6>
                                        Added <span>Feb 8, 2016</span>
                                    </div>
                                </li>
                                <li class="alert alert-dismissible  fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="cs-media">
                                        <a href="#">
                                            <img src="assets/extra-images/single-banner-img-3.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Desktop Application Developer Support</a></h6>
                                        Added <span>Feb 8, 2016</span>
                                    </div>
                                </li>
                            </ul>
                            <a class="btn-view-all" href="#">View All</a>
                        </div>
                    </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>