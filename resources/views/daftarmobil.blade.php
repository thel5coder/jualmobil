@extends('main')
@section('content')
<div class="page-section" style="background:url(public/extra-images/user-bg-img.jpg) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
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
                            <div class="cs-user-section-title"><h4>Iklan Mobil Saya</h4>
                                <ul>
                                    <li><a href="#" class="cs-active-btn">Active</a>
                                        <ul>
                                            <li><a href="#">aktif</a></li>
                                            <li><a href="#">nonaktif</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="cs-featurelisted-car">
                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-media">
                                    <figure><a href="#"><img src="public/extra-images/car-shortlisted-img1.jpg" alt=""/></a></figure>
                                </div>
                                <div class="cs-text">
                                    <span class="cs-featured">Featured</span>
                                    <h6><a href="#">Toyota Corolla XLi VVTi for Sale</a></h6>
                                    <div class="post-options">
                                        <span>Expires <em>26 September 2015</em></span>
                                        <span><a href="#"> Total Views  <em>59</em></a></span>
                                    </div>
                                    <div class="cs-post-types">
                                        <div class="cs-post-list">
                                            <div class="cs-edit-post">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Edit Post"><i class="icon-edit2"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="icon-trash-o"></i></a>
                                            </div>
                                            <div class="cs-list">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="icon-forward4"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Edit Post"><i class=" icon-clone"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="icon-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <span class="cs-default-btn" style="color:#4aa818; border:1px solid #4aa818;">Active</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-media">
                                    <figure><a href="#"><img src="public/extra-images/car-shortlisted-img2.jpg" alt=""/></a></figure>
                                </div>
                                <div class="cs-text">
                                    <h6><a href="#">used Toyota Corolla XLi VVTi 2004</a></h6>
                                    <div class="post-options">
                                        <span>Expires <em>26 September 2015</em></span>
                                        <span><a href="#"> Total Views  <em>59</em></a></span>
                                    </div>
                                    <div class="cs-post-types">
                                        <div class="cs-post-list">
                                            <div class="cs-edit-post">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Edit Post"><i class="icon-edit2"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="icon-trash-o"></i></a>
                                            </div>
                                            <div class="cs-list">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class="icon-forward4"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Edit Post"><i class=" icon-clone"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="icon-trash-o"></i></a>
                                            </div>
                                        </div>
                                        <span class="cs-default-btn" style="color:#4aa818; border:1px solid #4aa818;">Active</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="cs-load-more"><a href="#" class="loadmore-btn">Load more</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

