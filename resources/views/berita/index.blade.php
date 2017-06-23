@extends('mainberita')
@section('content')
    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Berita Mobil Tren</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <br>
            {{--//baner--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="post-image">
                        <div class="owl-carousel owl-theme"
                             data-plugin-options='{"items":1 ,"nav": true,"dots": false}'>
                            @foreach($beritaBanner as $banner)
                                <div>
                                    <a href="{{ route('beritaSlug', ['slug' => $banner->slug]) }}">
                                        <div class="img-thumbnail">
                                            <img class="img-responsive" src="{{ $banner->images }}" alt=""
                                                 style="width: 1280px; height: 500px;">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <hr class="tall">

            {{--main--}}
            <div class="row">
                {{--article--}}
                <div class="col-md-9">
                    <div class="blog-posts">

                        @foreach($berita as $dataBerita)
                            <article class="post post-medium">
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="post-image">
                                            <div class="img-thumbnail">
                                                <a href="{{ route('beritaSlug', ['slug' => $dataBerita->slug ]) }}">
                                                    <img class="img-responsive"
                                                         src="{{ $dataBerita->images }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">

                                        <div class="post-content">

                                            <h2>
                                                <a href="{{ route('beritaSlug', ['slug' => $dataBerita->slug ]) }}">
                                                    {{$dataBerita->judul}}
                                                </a>
                                            </h2>
                                            <p>{{ str_limit($dataBerita->deskripsi_singkat,200,'[...]') }}</p>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-meta">
                                            <span><i class="fa fa-calendar"></i> {{ $dataBerita->created_at->diffForHumans() }} </span>
                                            <span><i class="fa fa-user"></i> By <a href="#">{{ $dataBerita->name }}</a> </span>
                                            <span><i class="fa fa-tag"></i>
                                                @foreach($kategori[$dataBerita->id] as $dataKategori )
                                                    <a href="{{route('kategoriSlug',['kategori' => $dataKategori->slug_kategori])}}">{{ $dataKategori->kategori }}</a>
                                                    ,
                                                @endforeach
                                            </span>
                                            <a href="{{ route('beritaSlug', ['slug' => $dataBerita->slug ]) }}"
                                               class="btn btn-xs btn-primary pull-right">Read
                                                more...</a>
                                        </div>
                                    </div>
                                </div>

                            </article>
                        @endforeach
                        <div class="text-center">
                            <a href="" class="center"> More.... </a>
                        </div>
                            <hr class="taill">

                    </div>
                </div>

                <div class="col-md-3">
                    <aside class="sidebar">

                        <form>
                            <div class="input-group input-group-lg">
                                <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
                                <span class="input-group-btn">
											<button type="submit" class="btn btn-primary btn-lg"><i
                                                        class="fa fa-search"></i></button>
										</span>
                            </div>
                        </form>

                        <hr>

                        <h4 class="heading-primary">Kategori Berita</h4>
                        <ul class="nav nav-list mb-xlg">
                            @foreach($tagKategori as $allKategori)
                                <li>
                                    <a href="{{route('kategoriSlug',['kategori' => $allKategori->slug_kategori])}}">{{$allKategori->kategori}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <br>
                        <div class="tabs mb-xlg">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i>Populer</a>
                                </li>
                                <li><a href="#recentPosts" data-toggle="tab"><i class="fa fa-clock-o"></i> Baru</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="popularPosts">
                                    <ul class="simple-post-list">
                                        @foreach($popularBerita as $popular)
                                            <li>
                                                <div class="post-image">
                                                    <div class="img-thumbnail">
                                                        <a href="{{route('beritaSlug', ['slug' => $popular->slug ])}}">
                                                            <img src="{{ $popular->images }}"
                                                                 alt="" class="img-responsive"
                                                                 style="width: 50px; height: 50px;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="post-info">
                                                    <a href="{{route('beritaSlug', ['slug' => $popular->slug ])}}">
                                                        {{ $popular->judul }}
                                                    </a>
                                                    <div class="post-meta">
                                                        {{ $popular->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane" id="recentPosts">
                                    <ul class="simple-post-list">
                                        @foreach($otherBerita as $other)
                                            <li>
                                                <div class="post-image">
                                                    <div class="img-thumbnail">
                                                        <a href="{{route('beritaSlug', ['slug' => $other->slug ])}}">
                                                            <img src="{{ $other->images }}"
                                                                 alt="" class="img-responsive"
                                                                 style="width: 50px; height: 50px;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="post-info">
                                                    <a href="{{route('beritaSlug', ['slug' => $other->slug ])}}">{{ $other->judul }}</a>
                                                    <div class="post-meta">
                                                        {{ $other->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h4 class="heading-primary">About Us</h4>
                        <p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id
                            sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor
                            ligula, faucibus id sodales in, auctor fringilla libero. </p>

                    </aside>
                </div>
            </div>

        </div>

    </div>
@stop
