@extends('main')
@section('content')
    <div class="cs-subheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-subheader-text">
                        <h2>{{$dataBerita->judul}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Start -->
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="cs-media" style="margin-bottom:30px;">
                            <li>
                                <figure><img src="{{$dataBerita->images}}" alt="{{$dataBerita->judul}}" height="485"
                                             width="800"/>
                                </figure>
                            </li>
                        </div>
                        <div class="cs-blog-post">
                            <div class="cs-thumb-post">
                                @if($dataBerita->image == '')
                                    <div class="cs-media">
                                        <figure><img src="{{asset('public/extra-images/blog-post-thumb.jpg')}}"
                                                     alt="" width="41" height="41"/></figure>
                                    </div>
                                @else
                                    <div class="cs-media">
                                        <figure><img src="{{$dataBerita->image}}"
                                                     alt="" width="41" height="41"/></figure>
                                    </div>
                                @endif
                                <div class="cs-text">
                                        <span>by {{$dataBerita->name}}
                                            <br>{{$dataBerita->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="cs-blog-detail-text">
                            {!! $dataBerita->deskripsi !!}
                        </div>
                        @if(auth()->check())
                            @if(auth()->user()->tipe_user !== "admin")
                                <div class="cs-blog-related-post">
                                    <h3>Related post</h3>
                                    <div class="row">
                                        @foreach($relatedPost as $post)
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="blog-medium">
                                                    <div class="cs-media">
                                                        <a href="#">
                                                            <img src="{{$post->images}}" alt="{{$post->judul}}"
                                                                 style="width: 240px;"/>
                                                        </a>
                                                    </div>
                                                    <div class="cs-text">
                                                        <h4><a href="#">{{$post->judul}}</a></h4>

                                                        <p>{{  $post->deskripsi_singkat }}</p>
                                                        <a href="" class="cs-color">Lihat Selegkapnya <i
                                                                    class="icon icon-arrow-bold-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="cs-comments">
                                    <h3>{{count($dataKomentar)}} Komentar</h3>
                                    @foreach($dataKomentar as $komentar)
                                        <ul>
                                            <li>
                                                <div class="thumblist">
                                                    <ul>
                                                        <li>
                                                            <div class="cs-media">
                                                                <figure>
                                                                    @if($komentar->image == '')
                                                                        <img src="{{asset('public/extra-images/cs-comment-1.jpg')}}"
                                                                             alt=""/>
                                                                    @else
                                                                        <img src="{{$komentar->image}}" alt=""/>
                                                                    @endif
                                                                </figure>
                                                            </div>
                                                            <div class="cs-text">
                                                                <div class="cs-title">
                                                                    <h6>{{$komentar->name}}</h6>
                                                                    <span>{{$komentar->created_at->diffForHumans()}}</span>
                                                                </div>
                                                                <p>{{$komentar->komentar}}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                                <div class="cs-contact-form">
                                    <h3>leave a comment</h3>
                                    <form id="formKomentar">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-holder">
                                                        <label>Message</label>
                                                        <textarea id="komentar"
                                                                  placeholder="Saya tertarik dengan harga penawaran kendaraan ini. Silahkan hubungi saya secepatnya dengan harga terbaik untuk kendaraan ini"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-holder">
                                                        <input type="submit" class="btn" value="Submitt comments">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @else
                            <div class="cs-blog-related-post">
                                <h3>Related post</h3>
                                <div class="row">
                                    @foreach($relatedPost as $post)
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="blog-medium">
                                                <div class="cs-media">
                                                    <a href="#">
                                                        <img src="{{$post->images}}" alt="{{$post->judul}}"
                                                             style="width: 240px;"/>
                                                    </a>
                                                </div>
                                                <div class="cs-text">
                                                    <h4><a href="#">{{$post->judul}}</a></h4>

                                                    <p>{{  $post->deskripsi_singkat }}</p>
                                                    <a href="" class="cs-color">Lihat Selegkapnya <i
                                                                class="icon icon-arrow-bold-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="cs-comments">
                                @if(count($dataKomentar) == [])
                                    <h3> {{count($dataKomentar)}} Komentar</h3>
                                    @foreach($dataKomentar as $komentar)
                                        <ul>
                                            <li>
                                                <div class="thumblist">
                                                    <ul>
                                                        <li>
                                                            <div class="cs-media">
                                                                <figure>
                                                                    @if($komentar->image == '')
                                                                        <img src="{{asset('public/extra-images/cs-comment-1.jpg')}}"
                                                                             alt=""/>
                                                                    @else
                                                                        <img src="{{$komentar->image}}" alt=""/>
                                                                    @endif
                                                                </figure>
                                                            </div>
                                                            <div class="cs-text">
                                                                <div class="cs-title">
                                                                    <h6>{{$komentar->name}}</h6>
                                                                    <span>{{$komentar->created_at->diffForHumans()}}</span>
                                                                </div>
                                                                <p>{{$komentar->komentar}}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach
                                @else
                                    <h3><a href="{{route('login')}}">Tinggalkan Komentar ?</a></h3>
                                @endif
                            </div>
                        @endif
                    </div>
                    <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        @if( auth()->check() && auth()->user()->tipe_user == 'admin' && $dataBerita->status == 'moderasi')
                            <div class="widget widget-recent-posts">
                                <ul>
                                    <li>
                                        <button class="btn btn-compare btn-danger" onclick="setReject()"><i
                                                    class="fa fa-close"></i>
                                            Tolak
                                        </button>
                                        <button class="btn btn-shortlist btn-success" onclick="setAccept()"><i
                                                    class="fa fa-check"></i>
                                            Aktifkan
                                        </button>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                        <input type="hidden" id="slug" value="{{$dataBerita->slug}}">
                                    </li>
                                </ul>
                            </div>
                        @else
                            <div class="widget widget-recent-posts">
                                <h6>Berita Lainnya</h6>
                                <br>
                                <ul>
                                    @forelse($otherBerita as $dataBeritaLainnya)
                                        <li>
                                            <div class="">
                                                    <a href="#">
                                                        <img src="{{$dataBeritaLainnya->images}}" class="img-responsive"/>
                                                    </a>
                                            </div>
                                            <div class="cs-text">
                                                <a href="#" style="font-size: 17px;">{{$dataBeritaLainnya->judul}}</a>
                                                <span><i class="icon-clock5"></i>{{$dataBeritaLainnya->created_at->diffForHumans()}}</span>
                                            </div>
                                        </li>
                                </ul>
                                @empty
                                    Belum Ada Berita Baru , <a href="{{route('login')}}">Buat Berita Sekarang ?!</a>
                                @endforelse
                                <br>
                                <a href="{{route('berita')}}" class="cs-view-blog">View all Blogs</a>
                            </div>
                        @endif
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
                                    <img src="{{asset('public/extra-images/cs-ad-img.jpg')}}" alt=""/>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script type="text/javascript">
        function setReject() {
            swal({
                title: 'Reject Iklan Ini ?! ',
                text: "Tulis alasan mengapa iklan ditolak",
                type: 'warning',
                input: 'textarea',
                showCancelButton: true,
                confirmButtonText: 'Kirim',
                showLoaderOnConfirm: true,
            }).then(function (input) {
                runWaitMe('body', 'roundBounce', 'Set reject Berita...');
                $.ajax({
                    url: "<?= url('backend/berita/setstatusberita')?>",
                    method: "POST",
                    data: {
                        _token: $('#token').val(),
                        id: " <?= $dataBerita->id ?> ",
                        alasan: input,
                        status: 'nonaktif',
                        slug: $('#slug').val()
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            window.location.reload()
                        } else {
                            $('body').waitMe('hide');
                            var errorMessagesCount = s.message.length;
                            for (var i = 0; i < errorMessagesCount; i++) {
                                notificationMessage(s.message[i], 'error');
                            }
                        }
                    }
                });
            });
        }
        function setAccept() {
            swal({
                title: 'Aktifkan Iklan ',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aktfkan!'
            }).then(function () {
                runWaitMe('body', 'roundBounce', 'Set Aktif Data...');
                $.ajax({
                    url: "<?= url('backend/berita/setstatusberita')?>",
                    method: 'POST',
                    data: {
                        _token: $('#token').val(),
                        id: " <?= $dataBerita->id ?> ",
                        status: 'aktif',
                        slug: $('#slug').val()
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            window.location.reload()
                        } else {
                            $('body').waitMe('hide');
                            var errorMessagesCount = s.message.length;
                            for (var i = 0; i < errorMessagesCount; i++) {
                                notificationMessage(s.message[i], 'error');
                            }
                        }
                    }
                });
            });
        }
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