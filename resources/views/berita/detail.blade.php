@extends('mainberita')
@section('content')
    <div role="main" class="main">

        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="{{route('berita')}}">Berita</a></li>
                            <li class="active">{{$dataBerita->judul}}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$dataBerita->judul}}</h1>
                    </div>
                </div>
            </div>
        </section>

        {{--main--}}
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts single-post">

                        <article class="post post-large blog-single-post">
                            <div class="post-image">
                                <div>
                                    <div class="img-thumbnail">
                                        <img class="img-responsive" src="{{$dataBerita->images}}" alt=""
                                             class="img-responsive" style="width: 835px; height: 325px;">
                                    </div>
                                </div>
                            </div>

                            <div class="post-date">
                                <span class="day">10</span>
                                <span class="month">Jan</span>
                            </div>

                            <div class="post-content">

                                <h2><a>{{ $dataBerita->judul }}</a></h2>

                                <div class="post-meta">
                                    <span><i class="fa fa-user"></i> By <a> {{ $dataBerita->name }}</a> </span>
                                    <span><i class="fa fa-tag"></i>
                                        @foreach($dataBeritaKategori as $kategori)
                                            <a href="{{route('kategoriSlug', ['slug' => $kategori->slug_kategori])}}">{{$kategori->kategori}}</a>
                                            ,
                                        @endforeach
                                    </span>
                                    <span><i class="fa fa-comments"></i> <a href="#">{{count($dataKomentar)}}
                                            Comments</a></span>
                                </div>

                                {!! $dataBerita->deskripsi !!}

                                <div class="post-block post-share">
                                    <h3 class="heading-primary"><i class="fa fa-share"></i>Share this post</h3>

                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style ">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                    </div>
                                    <script type="text/javascript"
                                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                                    <!-- AddThis Button END -->

                                </div>
                                @if( count($dataKomentar) !== 0 )
                                    <div class="post-block post-comments clearfix">
                                        <h3 class="heading-primary"><i class="fa fa-comments"></i>Comments
                                            ({{count($dataKomentar)}})</h3>
                                        @foreach($dataKomentar as $komentar)
                                            <ul class="comments">
                                                <li>
                                                    <div class="comment">
                                                        <div class="img-thumbnail">
                                                            @if($komentar->image == '')
                                                                <img class="avatar" alt=""
                                                                     src="{{asset('public/img/avatars/avatar-2.jpg')}}">
                                                            @else
                                                                <img class="avatar" alt=""
                                                                     src="{{$komentar->image}}"
                                                                     style="width: 150px; height: 150px;">
                                                            @endif
                                                        </div>
                                                        <div class="comment-block">
                                                            <div class="comment-arrow"></div>
                                                            <span class="comment-by">
                                                            <strong>{{$komentar->name}}</strong>
                                                        </span>
                                                            <p>{{$komentar->komentar}}</p>
                                                            <span class="date pull-right">{{$komentar->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @endif
                                @if(auth()->check())
                                    <div class="post-block post-leave-comment">
                                        <h3 class="heading-primary">Leave a comment</h3>

                                        <form id="formKomentar">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Komentar *</label>
                                                        <textarea id="komentar"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" value="Post Comment"
                                                           class="btn btn-primary btn-lg"
                                                           data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </article>

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
@section('customscript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#formKomentar').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    komentar: {
                        required: true,
                        minlength: 8
                    }
                },

                messages: {
                    komentar: {
                        required: "merk harus di isi",
                        minlength: "Minimal 8 Karakter"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit

                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                        error.insertAfter($('#register_tnc_error'));
                    } else if (element.closest('.input-icon').size() === 1) {
                        error.insertAfter(element.closest('.input-icon'));
                    } else {
                        error.insertAfter(element);
                    }
                },

                submitHandler: function (form) {
                    runWaitMe('body', 'roundBounce', 'Menyimpan Data...');

                    $.ajax({
                        url: "<?= url('backend/komentar/create')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            beritaId: " <?= $dataBerita->id ?> ",
                            komentar: $('#komentar').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                window.location.reload();
                            } else {
                                $('body').waitMe('hide');
                                var errorMessagesCount = s.message.length;
                                for (var i = 0; i < errorMessagesCount; i++) {
                                    notificationMessage(s.message[i], 'error');
                                }
                            }
                        }
                    })
                }
            });
        });
    </script>
@stop