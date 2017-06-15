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
    <div class="cs-subheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-subheader-text">
                        <h2>Blog Medium</h2>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li class="active"><a href="#">Latest Blog</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Start -->
    <div class="main-section">
        <div class="page-section" style="padding-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="row">
                                @foreach($berita as $dataBerita)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 50px">
                                        <div class="blog-listing medium-view">
                                            <div class="cs-media">
                                                <figure>
                                                    <a href="{{route('beritaSlug',['slug' => $dataBerita->slug])}}">
                                                        <img src="{{$dataBerita->images}}" alt="{{$dataBerita->judul}}"/>
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="cs-text">
                                                <div class="post-title">
                                                    <h4><a href="{{route('beritaSlug',['slug' => $dataBerita->slug])}}">{{$dataBerita->judul}}</a></h4>
                                                </div>
                                                <p>{{$dataBerita->deskripsi_singkat}}</p>
                                                <div class="post-detail">
                                                    <span class="post-author"><i class="icon-user4"></i> <a href="#">{{$dataBerita->name}}</a></span>
                                                    <span class="post-date"> {{$dataBerita->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div >
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="widget-search">
                            <div class="input-holder">
                                <input type="text" placeholder="Enter any keyword">
                                <label><input type="submit" value=""></label>
                            </div>
                        </div>
                        <div class="widget widget-recent-posts">
                            <h6>Recent Posts</h6>
                            <ul>
                                <li>

                                    <div class="cs-media">
                                        <figure><a href="#"><img src="assets/extra-images/recent-widget-1.jpg" alt=""/></a>
                                        </figure>
                                    </div>
                                    <div class="cs-text">
                                        <a href="#">Nissan Rogue SV AWD Review: best So Roguish What Price
                                            Supercar-dom?</a>
                                        <span><i class="icon-clock5"></i>3 Days Ago</span>
                                    </div>
                                </li>
                            </ul>
                            <a href="#." class="cs-view-blog">View all Blogs</a>
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
                                    <img src="assets/extra-images/cs-ad-img.jpg" alt=""/>
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