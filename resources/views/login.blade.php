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
            </div>
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="cs-signin">
                    <h4>LOGIN</h4>
                    <div class="row">
                        <form id="formLogin">
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Email</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="email" id="email" placeholder=""/>
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Password *</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" name="password" id="password" placeholder=""/>
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-btn-submit">
                                        <input type="submit" value="Login">
                                    </div>
                                    <a href="#" class="cs-forgot-password" data-toggle="modal"
                                       data-target="#user-forgot-pass" data-dismiss="modal"><i
                                                class="cs-color icon-help-with-circle"></i>Forgot password?</a>
                                </div>
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" id="token" name="_token"/>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-checkbox">
                                        <input id="check15" type="checkbox" name="check" value="check1">
                                        <label for="check15">Remember me</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            Belum punya akun? <a href="{{route('registerForm')}}" class="btn btn-link"><i
                                        class="icon-account_circle"></i> Buat Akun</a>
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
            $('#formLogin').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },

                messages: {
                    email: {
                        required: "email harus di isi",
                        email: "Email Tidak Vaild"
                    },
                    password: {
                        required: "Password harus Diisi"
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
                    runWaitMe('body', 'roundBounce', 'Login...');
                    $.ajax({
                        url: "<?= route('doLogin')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            email: $('#email').val(),
                            password: $('#password').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                //location.reload();
                                window.location = "<?= route('dashboard')?>";
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