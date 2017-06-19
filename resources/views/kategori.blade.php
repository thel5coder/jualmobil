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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @include('partials.dashboardmenu')
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title"><h4>Daftar Kategori</h4>
                                        <div class="pull-right">
                                            <a class="btn btn-success" data-toggle="modal" data-target="#add-kategori"
                                               aria-hidden="true"> <i class="fa fa-plus-circle"></i> Kategori </a>
                                        </div>
                                        {{--modal--}}
                                        <div class="modal fade" id="add-kategori" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Tambah Kategori</h4>
                                                        <br>
                                                        <form class="user-post-vehicles" id="formkategori"
                                                              style="margin-top: 30px">
                                                            <div class="cs-field-holder">
                                                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                                    <label>Kategori</label>
                                                                </div>
                                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                                    <div class="cs-field">
                                                                        <input type="text" name="kategori"
                                                                               id="kategori">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="_token" id="token"
                                                                   value="{{csrf_token()}}">
                                                            <div class="cs-field-holder">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-md-12">
                                                                    <div class="cs-field">
                                                                        <div class="cs-btn-submit">
                                                                            <input type="submit" value="SIMPAN">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="cs-featurelisted-car">
                                    @foreach($dataKategori as $kategori)
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-text">
                                                <h6>{{$kategori->kategori}}</h6>
                                                <div class="post-options">
                                                    <span>Dibuat <em> {{ $kategori->created_at->diffForHumans() }}</em></span>
                                                </div>
                                                <div class="cs-post-types">
                                                    <div class="cs-post-list">
                                                        <div class="">
                                                            <a data-toggle="tooltip" data-placement="top" class="btn btn-danger"
                                                               title="Delete" onclick="deleteKategori({{$kategori->id}})"><i class="icon-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                               {!! $dataKategori->render() !!}
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

        function deleteKategori(id) {
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
                    url: "<?= url('backend/kategori/delete/')?>/" + id,
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

        $(document).ready(function(){

            $('#formkategori').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    kategori: {
                        required: true,
                    }
                },

                messages: {
                    kategori: {
                        required: "kategori harus di isi"
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
                        url: "<?= url('backend/kategori/store')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            kategori: $('#kategori').val(),
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

