<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoMobile</title>
    @include('partials.style')
</head>
<body class="wp-automobile single-post">
<div class="wrapper">
    @include('partials.header')
    <div class="main-section-berita">
        {{--//banner--}}
        <div class="page-section" style="background: rgba(237, 240, 245, 1); padding-top:70px; padding-bottom:70px;">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <!--Element Section Start-->
                            <div class="cs-auto-listing cs-auto-box">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="cs-auto-box-slider row">
                                        @foreach($beritaBanner as $banner)
                                            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="cs-media"><span></span>
                                                    <figure><a href="#"> <img src="{{$banner->images}}" alt=""
                                                                              class="img-responsive"> </a></figure>
                                                    <div class="caption-text"><a href="#"><h2> {{$banner->judul}} </h2>
                                                        </a></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--Element Section End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{--kategori berita--}}
        <div class="page-section" style="padding-top:20px;">
            <div class="container">
                <div class="row">

                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 co-sm-12 col-xs-12"><!--Element Section Start-->
                                <div class="cs-section-title">
                                    <h3 style="text-transform:uppercase !important;">Kategori Berita</h3>
                                </div>
                                <!--Tabs Start-->

                                <div class="cs-tabs full-width">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">Review</a></li>
                                        <li><a data-toggle="tab" href="#menu1">Galeri</a></li>
                                        <li><a data-toggle="tab" href="#menu2">Tips</a></li>
                                        <li><a data-toggle="tab" href="#menu3">Spesifikasi</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        
                                    </div>
                                </div>
                                <!--Tabs End-->
                                <!--Element Section End--></div>
                        </div>
                        <div class="row">
                            <div class="cs-seprator"></div>
                            <div class="cs-section-title">
                                <h3 style="text-transform:uppercase !important;">Berita Terbaru</h3>
                            </div>
                            @foreach($berita as $dataBerita)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 50px">
                                    <div class="blog-listing medium-view">
                                        <div class="cs-media">
                                            <figure>
                                                <a href="{{route('beritaSlug',['slug' => $dataBerita->slug])}}">
                                                    <img src="{{$dataBerita->images}}"
                                                         alt="{{$dataBerita->judul}}"/>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="cs-text">
                                            <div class="post-title">
                                                <h4>
                                                    <a href="{{route('beritaSlug',['slug' => $dataBerita->slug])}}">{{$dataBerita->judul}}</a>
                                                </h4>
                                            </div>
                                            <ul class="cs-auto-categories">
                                                @foreach($kategori[$dataBerita->id] as $dataKategori)
                                                    <li>
                                                        <a href="{{route('kategoriSlug',['kategori' => $dataKategori->slug_kategori])}}"
                                                           class="cs-color">{{$dataKategori->kategori}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <p>{{$dataBerita->deskripsi_singkat}}</p>
                                            <div class="post-detail">
                                                    <span class="post-author"><i class="icon-user4"></i> <a
                                                                href="#">{{$dataBerita->name}}</a></span>
                                                <span class="post-date"> {{$dataBerita->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{--//asideaman--}}
                    <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="widget widget-recent-posts">
                            <h6>Berita Terpopuler</h6>
                            <br>
                            @foreach($popularBerita as $popular)
                                <ul>
                                    <li>
                                        <div class="cs-media">
                                            <a href="#">
                                                <img src="{{$popular->images}}" alt=""
                                                     class="img-circle img-responsive" width="41" height="42"/>
                                            </a>
                                        </div>
                                        <div class="cs-text">
                                            <a href="#">{{$popular->judul}}</a>
                                            <span><i class="icon-clock5"></i>{{$popular->created_at->diffForHumans()}}</span>
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                            <br>
                            <a href="{{route('berita')}}" class="cs-view-blog">View all Blogs</a>
                        </div>
                        <div class="widget widget-tags">
                            <h6>Tag Cloud</h6>
                            @foreach($kategori as $tagKategori)
                                <a href="{{route('kategoriSlug',['kategori' => $tagKategori ])}}">{{$tagKategori->kategori}}</a>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="page-section" style="background:#19171a;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-ad" style="text-align:center; padding:55px 0 32px;">
                            <div class="cs-media">
                                <figure>
                                    <img src="public/extra-images/cs-ad-img.jpg" alt=""/>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main End -->

    @include('partials.footer')
</div>
@include('partials.script')
</body>
</html>