@extends('main')
@section('content')
    <div class="main-section">
        <div class="page-section"
             style="background:url(public/extra-images/user-bg-img.jpg) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-user-account-holder">
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        @include('partials.dashboardmenu')
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-user-section-title">
                                            <h4>Review Berita - <em>{{$dataBerita->name}}</em></h4>
                                        </div>
                                    </div>
                                    <br>
                                    <form id="formUpdateBerita">
                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Judul Berita</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="cs-field">
                                                    <h6>{{$dataBerita->judul}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Gambar Utama</label> <br>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="cs-upload-img">
                                                    <div class="input-group">
                                                        @if($dataBerita->images == '')
                                                            <span class="input-group-btn">
                                                                 <img src="https://dummyimage.com/1020x400/f23d52/fafafa.png&text=Edit+Featured+Image"
                                                                      style="margin-top:15px;max-height:100px;">
                                                           </span>
                                                        @else
                                                            <span class="input-group-btn">
                                                                 <img src="{{$dataBerita->images}}"
                                                                      alt="{{$dataBerita->judul}}"
                                                                      style="margin-top:15px;max-height:100px;">
                                                           </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Kategori Berita</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="cs-field">
                                                    <ul>
                                                        @foreach($kategori as $dataKategoriBerita)
                                                            <li>{{$dataKategoriBerita->kategori}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Deskripsi Singkat</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="cs-field">
                                                    <p>{{$dataBerita->deskripsi_singkat}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                {!! $dataBerita->deskripsi !!}
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                        <input type="hidden" id="id" value="{{$dataBerita->id}}">
                                        <input type="hidden" id="slug" value="{{$dataBerita->slug}}">
                                        <input type="hidden" id="email" value="{{$dataBerita->email}}">
                                        <input type="hidden" id="name" value="{{$dataBerita->name}}">
                                        @if(auth()->check() && auth()->user()->tipe_user == 'admin' && $dataBerita->status == 'moderasi')
                                            <div class="cs-field-holder">
                                                @if(auth()->user()->id == 4)
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                        <a class="btn btn-primary" id="btnAccept"
                                                           title="Aktifkan Berita Ini"><i class="fa fa-check"></i></a>
                                                        <a class="btn btn-danger" id="btnRejct" title="Tolak Betia Ini"><i
                                                                    class="fa fa-close"></i></a>
                                                        @if(auth()->user()->id == $dataBerita->user_id)
                                                            <a class="btn btn-warning" title="Hapus Beita Ini ?!"
                                                               onclick="deleteBerita('{{base64_encode($dataBerita->id)}}')"
                                                               id="tombolDelete"><i class="icon-trash-o"></i></a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <h6>Berita Sudah Direview</h6>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
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
    </div>
@stop
@section('customscript')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#btnAccept').click(function () {
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
                            slug: $('#slug').val(),
                            email : $('#email').val(),
                            name : $('#name').val()
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
            });

            $('#btnRejct').click(function () {
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
                            slug: $('#slug').val(),
                            email : $('#email').val(),
                            name : $('#name').val()
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
            });

        });
        function deleteBerita(id) {
            swal({
                title: 'Konfirmasi ',
                text: "Yakin ingin menghapus iklan ini?!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
            }).then(function () {
                runWaitMe('body', 'roundBounce', 'Mengapus Data...');
                $.ajax({
                    url: "<?= url('backend/berita/delete')?>/" + id,
                    method: 'GET',
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            window.location = "<?= route('beritaBackend') ?>"
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

            return false;
        }
    </script>
@stop