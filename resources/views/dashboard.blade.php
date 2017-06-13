@extends('main')
@section('customstyle')
    <link href="{{asset('public/plugins/select2/css/select2.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('public/css/select2-bootstrap.css')}}">
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @include('partials.dashboardmenu')
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-user-section-title">
                                        <h4>{{auth()->user()->name}}</h4>
                                    </div>
                                </div>
                                <br>
                                <form class="user-setting" id="formUpdateUser">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-profile-pic">
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                                <div class="profile-pic">
                                                    <div class="cs-media">
                                                        <figure><img src="public/extra-images/profile-pic.jpg" alt=""/>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="cs-browse-holder"><em>My Profile Photo</em> <span
                                                            class="file-input btn-file"> Update Avatar
												<input type="file" multiple id="image" name="imageAvatar">
												</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" name="name" id="name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->tipe_user !== 'admin')
                                        <div class="cs-field-holder">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label>Provinsi</label>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <select name="provinsi" kota="provinsi" id="provinsi">
                                                    <option selected>Pilih Provinsi...</option>
                                                    @foreach($provinsi as $prov)
                                                        <option value="{{$prov->id}}">{{$prov->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cs-field-holder">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label>Kota</label>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <select id="kota" name="kota">
                                                    <option value="United States">Pilih Kota...</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Kontak</h6>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Telepone</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" id="telepone" name="telepone">
                                                            <span>
                                                                    Bisa Dihubungi Wa ?
                                                                    <input type="checkbox" name="inWa" id="inWa" value="1">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <label>Pin BBM</label>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <input type="text" name="pibBbm" id="pinBbm">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Facebook</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" placeholder="" name="facebook" id="facebook">
                                                <span>*isi dengan link facebook</span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user" value="{{auth()->user()->id}}" id="idUser">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                            <div class="cs-field">
                                                <div class="cs-btn-submit"><input type="submit" value="Save Changes">
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
    <script type="text/javascript" src="{{asset('public/plugins/select2/js/select2.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').select2({theme: 'bootstrap'});
            var inWa = null;
            $("#inWa").change(function() {
                if(this.checked) {
                    inWa = $(this).val();
                }
            });
            $('#provinsi').change(function (e) {
                $.ajax({
                    url: '<?= url('/listing/getkota')?>/' + $(this).val(),
                    method: 'GET',
                    success: function (s) {
                        $('#kota').children('option:not(:first)').remove().end();
                        $('#kota').select2({
                            theme: 'bootstrap',
                            data: s
                        });
                    }
                });
            });
            $('#formUpdateUser').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {},
                messages: {},

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
                    $('input[name=filepath]').each(function () {
                        if ($(this).val() != '') {
                            carImage.push($(this).val());
                        }
                    });
                    $.ajax({
                        url: "<?= url('/user/update/')?>"+$('#idUser').val(),
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            id : $('#idUser').val(),
                            name : $('#name').val(),
                            provinsi : $('#provinsi option:selected').text(),
                            kota : $('#kota option:selected').text(),
                            telepone : $('#telepone').val(),
                            inWa : inWa,
                            pinBbm : $('#pinBbm').val(),
                            facebook : $('#facebook').val(),
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                //location.reload();
                                window.location = "<?= url('/listing')?>";
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
@endsection
