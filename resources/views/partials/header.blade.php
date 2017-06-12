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
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>