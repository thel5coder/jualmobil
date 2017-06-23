<div>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse megamenu"
         style="height: 67px; background: #242931 !important;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{route('iklan')}}">Cari Mobil</a></li>
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Review
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="cs-tabs full-width">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Review</a></li>
                                            <li><a data-toggle="tab" href="#menu1">Galeri</a></li>
                                            <li><a data-toggle="tab" href="#menu2">Tips</a></li>
                                            <li><a data-toggle="tab" href="#menu3">Spesifikasi</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="cs-auto-listing cs-auto-box">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="cs-element-title">
                                                                    <h2>Latest Released Car Models</h2>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <ul class="cs-auto-box-slider row">
                                                                    @foreach($beritaMegaMenuTips as $megaMenuTip)
                                                                        <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                            <div class="cs-media"><span
                                                                                        class="featured"></span>
                                                                                <figure><a href="#"> <img
                                                                                                src="{{$megaMenuTip->images}}"
                                                                                                alt=""/> </a>
                                                                                    <figcaption></figcaption>
                                                                                </figure>
                                                                                <div class="caption-text"><a href="#">
                                                                                        <h2>{{$megaMenuTip->judul}}</h2>
                                                                                    </a></div>
                                                                            </div>
                                                                            <div class="auto-text cs-bgcolor"><span>$28,000</span>
                                                                                <a href="#"
                                                                                   class="cs-button pull-right"><i
                                                                                            class="icon-arrow_forward">

                                                                                    </i>
                                                                                </a>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                balenono mulai 1 tekan 10 iki loh datane
                                                                mari

                                                                nek datane == kotong maringunu
                                                                tokno Data kosong
                                                                nek gak
                                                                balenono data-artikel
                                                                mari
                                                                mari
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                <div class="row">
                                                    @foreach($kategoriGaleri as $galeri)
                                                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                            <div class="auto-listing auto-grid">
                                                                <div class="cs-media">
                                                                    <figure>
                                                                        <img src="{{ $galeri->images }}" alt="#"/>
                                                                    </figure>
                                                                </div>
                                                                <div class="auto-text"><span
                                                                            class="cs-categories">{{ $galeri->user }}</span>
                                                                    <div class="post-title">
                                                                        <h6>
                                                                            <a href="{{route('beritaSlug' , [ 'slug' => $galeri->slug] )}}">{{ $galeri->judul }}</a>
                                                                        </h6>
                                                                        <div class="auto-price">
                                                                            <em>{{  str_limit($galeri->deskripsi_singkat , 100 , ' more...') }}</em>
                                                                        </div>
                                                                    </div>
                                                                    <a href="{{route('beritaSlug' , [ 'slug' => $galeri->slug] )}}"
                                                                       class="View-btn">View Detail<i
                                                                                class=" icon-arrow-long-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div id="menu2" class="tab-pane fade">
                                                <div class="row">
                                                    @foreach($kategoriTips as $tips)
                                                        <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                            <div class="auto-listing auto-grid">
                                                                <div class="cs-media">
                                                                    <figure><img src="{{$tips->images}}" alt="#"/>
                                                                    </figure>
                                                                </div>
                                                                <div class="auto-text"><span
                                                                            class="cs-categories">{{ $tips->name }}</span>
                                                                    <div class="post-title">
                                                                        <h6>
                                                                            <a href="{{route('beritaSlug' , [ 'slug' => $tips->slug] )}}">{{ $tips->judul }}</a>
                                                                        </h6>
                                                                        <div class="auto-price">
                                                                            <em>{{ str_limit($tips->deskripsi_singkat ,100 ,' more...') }}</em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cs-checkbox">
                                                                    </div>
                                                                    <a href="{{ route('beritaSlug' , [ 'slug' => $tips->slug] )}}"
                                                                       class="View-btn">View Detail<i
                                                                                class=" icon-arrow-long-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div id="menu3" class="tab-pane fade">
                                                <div class="row">
                                                    @foreach( $kategoriSpesifikasi as $spesifikasi )
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                            <div class="auto-listing auto-grid">
                                                                <div class="cs-media">
                                                                    <figure><img src="{{$spesifikasi->images}}"
                                                                                 alt="#"/>
                                                                    </figure>
                                                                </div>
                                                                <div class="auto-text"><span
                                                                            class="cs-categories">{{ $spesifikasi->name }}</span>
                                                                    <div class="post-title">
                                                                        <h6>
                                                                            <a href="{{ route('beritaSlug' , ['slug' => $spesifikasi->slug ]) }}"></a> {{$spesifikasi->judul}}
                                                                        </h6>
                                                                        <div class="auto-price">
                                                                            <em>{{ str_limit($spesifikasi->deskripsi_singkat,100,' more...') }}</em>
                                                                        </div>
                                                                    </div>
                                                                    <a href="{{ route('beritaSlug' , ['slug' => $spesifikasi->slug ]) }}"
                                                                       class="View-btn">View Detail<i
                                                                                class=" icon-arrow-long-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Galeri
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
