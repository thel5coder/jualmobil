@extends('main')
@section('customstyle')
    <link href="{{asset('public/plugins/select2/css/select2.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/css/select2-bootstrap.css')}}" rel="stylesheet">
@stop
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
                                            <h4>Update Berita</h4>
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
                                                    <input type="text" name="judul" id="judul"
                                                           value="{{$dataBerita->judul}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Gambar Utama</label> <br>
                                                <em>* klik gambar untuk merubah</em>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <div class="cs-upload-img">
                                                    <div class="input-group">
                                                        @if($dataBerita->images == '')
                                                            <span class="input-group-btn">
                                                                 <img src="https://dummyimage.com/1020x400/f23d52/fafafa.png&text=Edit+Featured+Image"
                                                                      id="gambarUtama" data-input="thumbnail2"
                                                                      data-preview="gambarUtama"
                                                                      style="margin-top:15px;max-height:100px;">
                                                           </span>
                                                        @else
                                                            <span class="input-group-btn">
                                                                 <img src="{{$dataBerita->images}}" alt="{{$dataBerita->judul}}"
                                                                      id="gambarUtama" data-input="thumbnail2"
                                                                      data-preview="gambarUtama"
                                                                      style="margin-top:15px;max-height:100px;">
                                                           </span>
                                                        @endif
                                                        <input id="thumbnail2" type="hidden" name="filepath"
                                                               value="{{$dataBerita->images}}">
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
                                                    <select name="kategoriBeritaId[]" id="kategoriBerita" multiple>
                                                        @foreach($kategori as $dataKategori)
                                                            <option value="{{$dataKategori->id}}" @if($dataKategori->kategori == $dataBerita->kategori) {{'selected'}} @endif >{{$dataKategori->kategori}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Deskripsi Singkat</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="cs-field">
                                                    <textarea name="deskripsiSingkat"
                                                              id="deskripsiSingkat">{{$dataBerita->deskripsi_singkat}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cs-field-holder">
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <textarea id="content"
                                                          name="deskripsi">{{$dataBerita->deskripsi}}</textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                        <input type="hidden" id="id" value="{{$dataBerita->id}}">
                                        <div class="cs-field-holder">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                                <div class="cs-field">
                                                    <div class="cs-btn-submit">
                                                        <input type="submit" value="Update & Simpan">
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
    <script type="text/javascript" src="{{asset('public/plugins/select2/js/select2.js')}}"></script>
    <script type="text/javascript">
        var domain = "jualmobil";
        $(document).ready(function () {

            $('select').select2({
                tags : true,
                theme: 'bootstrap'
            });

            $('#gambarUtama').filemanager('image', {prefix: domain});

            $('#formUpdateBerita').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: false,
                messages: false,

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
                    runWaitMe('body', 'roundBounce', 'Merubah Data...');
                    var content = CKEDITOR.instances.content.getData();
                    $.ajax({
                        url: "<?= route('berita.update')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            id: $('#id').val(),
                            judul: $('#judul').val(),
                            images: $('#thumbnail2').val(),
                            deskripsiSingkat: $('#deskripsiSingkat').val(),
                            deskripsi: content
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                //location.reload();
                                window.location = "<?= url('/backend/berita')?>";
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