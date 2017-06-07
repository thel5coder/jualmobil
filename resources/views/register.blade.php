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
                    <div class="cs-register">
                        <h4>Register</h4>
                        <div class="row">
                            <form method="post" action="{{url('/register')}}">
                                <div class="cs-field-holder">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Daftar Sebagai</label>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-field">
                                            <select data-placeholder="Sebagai" tabindex="1" class="chosen-select" name="tipeUser">
                                                <option value="admin">admin</option>
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
                                        <input type="text" name="name" placeholder="" />
                                    </div>
                                </div>
                                <div class="cs-field-holder">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label>Email address *</label>
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
                                        <label>Retype Password *</label>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" name="passwordcheck" placeholder="" />
                                    </div>
                                </div>
                                {{csrf_field()}}
                                <div class="cs-field-holder">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-btn-submit">
                                            <input type="submit" value="Register" >
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