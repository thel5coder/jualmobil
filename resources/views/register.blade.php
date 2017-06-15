@extends('main')
@section('content')
    <div class="main-section">

        <div class="page-section"
             style="background: #fafafa none repeat scroll 0 0;margin-bottom: 30px;margin-top: -30px;padding: 39px 0 44px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title" style="margin-bottom:20px;"></div>
                    </div>
                </div>

            </div>{{--container--}}
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="cs-register">
                    <h4>Register</h4>
                    <div class="row">
                        <form id="formRegister">
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Daftar Sebagai</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-field">
                                        <select data-placeholder="Sebagai" tabindex="1" class="chosen-select"
                                                name="tipeUser" id="tipeUser">
                                            <option value="individual">Individual</option>
                                            <option value="sales">Sales Dealer Resmin</option>
                                            <option value="showroom">Showroom</option>
                                        </select>
                                        {{--<em></em>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Name</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="name" id="name" placeholder="" required/>
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Email address *</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email" id="email" placeholder="" required/>
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Password *</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" name="password" id="password" placeholder="" required/>
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Retype Password *</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" name="passwordCheck" id="passwordCheck" placeholder=""
                                           required/>
                                </div>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-btn-submit">
                                        <input type="submit" value="Register">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            Sudah punya akun? <a href="{{route('login')}}" class="btn btn-link"><i
                                        class="icon-account_circle"></i> Login </a>
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
            $('#formRegister').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    tipeUser: {
                        required: true
                    },
                    name: {
                        required: true,
                        minlength: 5
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    passwordCheck: {
                        equalTo: '#password'
                    },
                },

                messages: {
                    tipeUser: {
                        required: "Tipe User Harus Diisi"
                    },
                    name: {
                        required: "Nama Harus Diisi",
                        minlength: "Nama Minimal teridiri dari 5 karakter"
                    },
                    email: {
                        required: "email harus di isi",
                        email: "Email Tidak Vaild"
                    },
                    password: {
                        required: "Password harus Diisi",
                        minlength: "Password minimal 8 karakter"
                    },
                    passwordCheck: {
                        equalTo: "Password Tidak Sama"
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
                    runWaitMe('body', 'roundBounce', 'Registrasi...');
                    $.ajax({
                        url: "<?= route('register')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            name: $('#name').val(),
                            email: $('#email').val(),
                            password: $('#password').val(),
                            tipeUser: $('#tipeUser').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                $('body').waitMe('hide');
                                swal({
                                    title: 'Selamat Registrasi Berhasil',
                                    text: "Cek akun email anda untuk mengaktifkan akun anda.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'OK!'
                                }).then(function () {
                                    window.location = "<?= route('login')?>";
                                });

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
            })
        });
    </script>
@stop