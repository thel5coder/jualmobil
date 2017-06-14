@extends('main')
@section('content')
    <div class="page-section"
         style="background:url(public/extra-images/user-bg-img.jpg) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-user-account-holder">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @include('partials.dashboardmenu')
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-user-section-title"><h4>Berita Saya</h4>
                                    <ul>
                                        <li><a href="#" class="cs-active-btn">Status</a>
                                            <ul>
                                                <li><a href="#">Ditolak</a></li>
                                                <li><a href="#">Aktif</a></li>
                                                <li><a href="#">Nonaktif</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @if(!empty($berita))
                                <ul class="cs-featurelisted-car">
                                    @foreach($berita as $dataBerita)
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-media">
                                                <figure>
                                                    <a href="#">
                                                        <img src="{{$dataBerita->images}}" alt="" width="111"
                                                             height="60"/>
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="cs-text">
                                                <h6><a href="{{route('readBerita',['id' => $dataBerita->id])}}">{{$dataBerita->judul}}</a></h6>
                                                <div class="post-options">
                                                    <span>Uploaded <em>{{$dataBerita->created_at->diffForHumans()}}</em></span>
                                                    <span><a href="#"> Total Views  <em>59</em></a></span>
                                                </div>
                                                <div class="cs-post-types">
                                                    <div class="cs-post-list">
                                                        <div class="cs-edit-post">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                               title="Edit Post"><i class="icon-edit2"></i></a>
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                               title="Delete"><i class="icon-trash-o"></i></a>
                                                        </div>
                                                        <div class="cs-list">
                                                            <a href="#" data-toggle="tooltip" data-placement="top"
                                                               title="Edit Post"><i class=" icon-clone"></i></a>
                                                            <a href="#"
                                                               onclick="deleteBerita('{{base64_encode($dataBerita->id)}}')"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Delete" id="tombolDelete"><i
                                                                        class="icon-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                    <span class="cs-default-btn"
                                                          style="color:#4aa818; border:1px solid #4aa818;">{{$dataBerita->status}}
                                                </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="cs-load-more">{!! $berita->render() !!}</div>
                            @else
                                <ul class="cs-featurelisted-car">
                                    <strong>Anda Tidak Punya Berita <a href="{{route('formBerita')}}">Buat Berita?</a></strong>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script type="text/javascript">
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
                    url: "<?= url('/berita/delete')?>/" + id,
                    method: 'GET',
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

            return false;
        }
    </script>
@stop

