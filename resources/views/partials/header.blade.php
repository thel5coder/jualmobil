<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <div class="cs-logo">
                    <div class="cs-media">
                        <figure><a href="#s"><img src="{{asset('public/images/cs-logo.png')}}" alt=""/></a></figure>
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
                                        <div class="cs-login-dropdown"><a href="{{route('dashboard')}}"><i
                                                        class="icon-user2"></i> {{auth()->user()->name}} <i
                                                        class="icon-chevron-down2"></i></a>
                                            <div class="cs-user-dropdown">
                                                <ul class="cs-user-accounts-list">
                                                    <li><a href="{{route('formbuatiklan')}}">Buat Iklan Baru</a></li>
                                                    <li><a href="{{route('listing')}}">Daftar Mobil</a></li>
                                                    <li><a href="{{route('beritaBackend')}}">Daftar Berita</a></li>
                                                    <li><a href="{{route('formBerita')}}">Buat Berita Baru</a></li>
                                                    @if(auth()->user()->tipe_user == 'admin')
                                                        <li><a href="{{route('formMerk')}}">Tambah Merk Baru</a></li>
                                                        <li><a href="{{route('formModel')}}">Tambah Model Baru</a></li>
                                                        <li><a href="{{route('formTipe')}}">Tambah Tipe Baru</a></li>
                                                    @endif
                                                </ul>
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