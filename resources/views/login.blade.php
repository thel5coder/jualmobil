@extends('main')
@section('content')
    <div class="main-section">
        <div class="page-section" style="background: #fafafa none repeat scroll 0 0;margin-bottom: 30px;margin-top: -30px;padding: 39px 0 44px;">
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
                        <form method="post" action="{{url('doLogin')}}">
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Email</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="email" placeholder="" />
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Password *</label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" name="password" placeholder="" />
                                </div>
                            </div>
                            <div class="cs-field-holder">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-btn-submit">
                                        <input type="submit" value="Login">
                                    </div>
                                    <a href="#" class="cs-forgot-password" data-toggle="modal" data-target="#user-forgot-pass" data-dismiss="modal"><i class="cs-color icon-help-with-circle"></i>Forgot password?</a>
                                </div>
                            </div>
                            {{ csrf_field() }}
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
                </div>
            </div>
        </div>
    </div>
@endsection