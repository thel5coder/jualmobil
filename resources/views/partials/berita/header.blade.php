<header id="header"
        data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-logo">
                        <a href="{{route('berita')}}">
                            <img alt="Mobil Tren" width="111" height="54" data-sticky-width="82" data-sticky-height="40"
                                 data-sticky-top="33" src="{{asset('public/image/mobiltren2.png')}}">
                        </a>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        <nav class="header-nav-top">
                            <ul class="nav nav-pills">
                                <li>
                                    <a href="{{url('/')}}"><i class="fa fa-home"></i> Mobil Tren</a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#"><i class="fa fa-angle-right"></i> Tentang Kami</a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#"><i class="fa fa-angle-right"></i> Kontak </a>
                                </li>
                                <li>
                                    <span class="ws-nowrap"><i class="fa fa-phone"></i> (123) 456-789</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-row">
                        <div class="header-nav">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                <nav>
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a href="{{route('berita')}}">All Berita</a>
                                        </li>
                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-toggle" href="#">
                                                Review
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="dropdown-mega-content">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <ul class="simple-post-list">
                                                                    <h4>Tips</h4>
                                                                    @foreach($beritaMegaMenuTips as $menuTips)
                                                                        <li>
                                                                            <div class="post-image">
                                                                                <a href="{{ route('beritaSlug', ['slug' => $menuTips->slug ]) }}">
                                                                                    <img src="{{ $menuTips->images }}"
                                                                                         alt=""
                                                                                         style="width: 78px; height:50px;">
                                                                                </a>
                                                                            </div>
                                                                            <div class="post-info">
                                                                                <a href="{{ route('beritaSlug', ['slug' => $menuTips->slug ]) }}">{{ $menuTips->judul }}</a>
                                                                                <div class="post-meta">{{ $menuTips->created_at->diffForHumans() }}</div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h4>Berita</h4>
                                                                <div class="owl-carousel owl-theme"
                                                                     data-plugin-options='{"items": 1, "margin": 10, "animateOut": "fadeOut"}'>
                                                                    @foreach($beritaMegaMenuBerita as $menuBerita)
                                                                        <div>
                                                                            <a href="{{ route('beritaSlug', ['slug' => $menuBerita->slug ]) }}">
                                                                                <img alt=""
                                                                                     class="img-responsive img-rounded"
                                                                                     src="{{$menuBerita->images}}">
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <ul class="simple-post-list">
                                                                    <h4>Spesifikasi</h4>
                                                                    @foreach($beritaMegaMenuSpesifikasi as $menuSpesifikasi)
                                                                        <li>
                                                                            <div class="post-image">
                                                                                <a href="{{ route('beritaSlug', ['slug' => $menuSpesifikasi->slug ]) }}">
                                                                                    <img src="{{ $menuSpesifikasi->images }}"
                                                                                         alt=""
                                                                                         style="width: 78px; height:50px;">
                                                                                </a>
                                                                            </div>
                                                                            <div class="post-info">
                                                                                <a href="{{ route('beritaSlug', ['slug' => $menuSpesifikasi->slug ]) }}">
                                                                                    {{ $menuSpesifikasi->judul }}
                                                                                </a>
                                                                                <div class="post-meta">
                                                                                    {{ $menuSpesifikasi->created_at->diffForHumans() }}
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-mega">
                                            <a class="dropdown-toggle" href="#">
                                                Galeri
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="dropdown-mega-content">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <br>
                                                                <div class="owl-carousel owl-theme show-nav-title"
                                                                     data-plugin-options='{"items": 6, "margin": 10, "loop": false, "nav": true, "dots": false}'>
                                                                    @foreach($beritaMegaMenuGaleri as $menuGaleri)
                                                                        <div>
                                                                            <a href="{{ route('beritaSlug', ['slug' => $menuGaleri->slug ]) }}">
                                                                                <img alt=""
                                                                                     class="img-responsive img-rounded"
                                                                                     src="{{$menuGaleri->images}}">
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>