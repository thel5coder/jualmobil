@extends('main')
@section('content')
<div class="main-section">
    <div class="page-section" style="background: url(public/extra-images/full-section-img.jpg)no-repeat; background-size:cover; padding:206px 0 80px; text-shadow: 3px 4px 6px rgba(0,0,0,.37);margin-top:-30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="image-frame defualt" style="padding-top:40px;">
                        <div class="cs-media">
                            <figure> <img src="{{ asset('public/extra-images/image-frame-1.png') }}" alt=""/> </figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-column-text"> <span class="cs-bgcolor" style="color:#fff; padding:5px 20px; text-shadow: 3px 4px 6px rgba(0,0,0,.37); margin-bottom:20px;">More refined interior</span>
                        <h1 style="color:#fff !important; font-size:50px !important; line-height:53px !important; text-shadow: 3px 4px 6px rgba(0,0,0,.37);">SAY HELLO
                            TO NEW KIND
                            OF yum DRIVING
                            PLEASURE.</h1>
                        <a href="#" class="cs-button" style="color:#fff;width:80px; height:80px; border-radius:50%; line-height:17px; text-align:center; padding-top:20px; letter-spacing:1px; font-weight:bold; vertical-align:middle; text-shadow: 3px 4px 6px rgba(0,0,0,.37); ">Starts From</a> <strong style=" vertical-align:middle; font-size:50px; color:#fff; text-shadow: 3px 4px 6px rgba(0,0,0,.37);"><em style="font-style:normal; font-size:30px; vertical-align:top; line-height:0;">$</em>55,897</strong> </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main Banner-->
    <!--Main Banner form-->
    <div class="page-section" style="background: rgba(36, 41, 49, 1); padding-top:33px;-webkit-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);-moz-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);box-shadow: 0 0 5px rgba(0,0,0,.4), inset 0px 2px rgba(255,255,255,.3);border: solid 1px #242931;margin-bottom:110px;">
        <div class="container">
            <div class="row">
                <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!--Element Section Start-->
                        <div class="main-search">
                            <form>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="search-input"> <i class="icon-search2"></i>
                                        <input type="text" placeholder="Search by Keyword" />
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <div class="select-dropdown">
                                        <select class="chosen-select">
                                            <option value="" selected="selected">Select Make</option>
                                            <option value="Alfa Romeo">Alfa Romeo</option>
                                            <option value="Alpine">Alpine</option>
                                            <option value="Aston Martin">Aston Martin</option>
                                            <option value="Audi">Audi</option>
                                            <option value="Bently">Bently</option>
                                            <option value="BMW">BMW</option>
                                            <option value="Bugatti">Bugatti</option>
                                            <option value="Ferrari">Ferrari</option>
                                            <option value="Fiat">Fiat</option>
                                            <option value="Lamborghini">Lamborghini</option>
                                            <option value="Lancia">Lancia</option>
                                            <option value="Land Rover">Land Rover</option>
                                            <option value="Maserati">Maserati</option>
                                            <option value="McLaren">McLaren</option>
                                            <option value="Mercedes-Benz">Mercedes-Benz</option>
                                            <option value="Mini">Mini</option>
                                            <option value="Opel">Opel</option>
                                            <option value="Peugeot">Peugeot</option>
                                            <option value="Porsche">Porsche</option>
                                            <option value="Renault">Renault</option>
                                            <option value="Rolls-Royce">Rolls-Royce</option>
                                            <option value="Vauxhall">Vauxhall</option>
                                            <option value="Volkswagen">Volkswagen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <div class="select-dropdown">
                                        <select  class="chosen-select">
                                            <option selected="selected">Select Type</option>
                                            <option value="Vehicles">Vehicles</option>
                                            <option value="Motors">Motors</option>
                                            <option value="Cars and Races">Cars and Races</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                    <!--    <div class="select-location">
                                <input type="text" placeholder="Select Location" />
                                <a href="#"><i class="icon-hair-cross"></i></a>
                            </div>-->
                                    <div class="select-location">
                                        <div class="select-location" id="cs-top-select-holder">
                                            <div class="cs_searchbox_div">
                                                <input type="text" name="cs_" class="form-control cs_search_location_field" placeholder="All Locations" autocomplete="off">
                                                <input type="hidden" value="" name="location" class="search_keyword">
                                                <div class="cs_location_autocomplete" style="width: 260px; left: 1042.5px; top: 751px; display: none;"></div>
                                            </div>
                                            <a class="location-btn pop" href="javascript:void(0);" id="popup"><i class="icon-target3"></i></a>
                                            <div class="select-popup" id="popup1"> <a id="cs_close" class="cs-location-close-popup"><i class="cs-color icon-times"></i></a>
                                                <p>Show With in</p>
                                                <div class="slider slider-horizontal">
                                                    <div class="slider-track">
                                                        <div class="slider-track-low" style="left: 0px; width: 0%;"></div>
                                                        <div class="slider-selection" style="left: 0%; width: 100%;"></div>
                                                        <div class="slider-track-high" style="right: 0px; width: 0%;"></div>
                                                        <div class="slider-handle min-slider-handle round" style="left: 100%;" tabindex="0"></div>
                                                        <div class="slider-handle max-slider-handle round hide" style="left: 0%;" tabindex="0"></div>
                                                    </div>
                                                    <div class="tooltip tooltip-main top" style="left: 100%; margin-left: 0px;">
                                                        <div class="tooltip-arrow"></div>
                                                        <div class="tooltip-inner">500</div>
                                                    </div>
                                                    <div class="tooltip tooltip-min top" style="display: none;">
                                                        <div class="tooltip-arrow"></div>
                                                        <div class="tooltip-inner"></div>
                                                    </div>
                                                    <div class="tooltip tooltip-max top" style="display: none;">
                                                        <div class="tooltip-arrow"></div>
                                                        <div class="tooltip-inner"></div>
                                                    </div>
                                                </div>
                                                <input type="text" data-slider-value="200" data-slider-step="20" data-slider-max="500" data-slider-min="0" name="radius" id="ex6392375604" style="display: none;" data-value="500" value="500">
                                                <span id="ex6CurrentSliderValLabel_job"><span id="ex6SliderVal392375604">500</span>Miles</span>
                                                <p class="my-location">of <i class="cs-color icon-location-arrow"></i><a onClick="cs_get_location(this)" class="cs-color">My location</a></p>
                                            </div>
                                        </div>
                                        <input type="text" name="cs_" class="cs-geo-location form-control txt-field geo-search-location" style="display:none;" onChange="this.form.submit()">
                                        <div style="display:none;" class="cs-undo-select"> <i class="icon-times"></i> </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
                                    <div class="search-btn">
                                        <input type="button" value="submit" class="cs-bgcolor">
                                        <label><a href="#">ADVANCE SEARCH</a></label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Element Section End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main Banner form-->
    <!--image frame with cloum text by My Shahzad-->
    <div class="page-section" style="margin-bottom:110px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="image-frame defualt">
                        <div class="cs-media">
                            <figure> <img src="{{asset('public/extra-images/image-frame.jpg')}}" alt=""/> </figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-column-text"> <span class="cs-color" style="font-size:14px;margin-bottom:15px;text-transform: capitalize !important; font-weight:bold;">ADAPTIVE DRIVE HEAD uP DISPLAY</span>
                        <h1 style=" line-height:43px !important;">Matte Black Chevy C7 Corvette
                            Stingray on Custom 21in Forgiato
                            Quinto Wheels.</h1>
                        <p style="margin-bottom:25px; ">Arear view camera and lane departure warning. This car has 6 airbags fitted for your protection. It has front &amp; rear power windows, central locking and 2nd row split folding seats. Family life is made easy in this 2016 Jaguar XF. This car has Bluetooth connectivity, side curtain airbags, subwoofer, trailer sway control, sports pedals and heads up information display. This car has forward collision alert/warning. This car comes with enough seats for 5. You can relax.</p>
                        <a href="#" class="cs-button" style="color:#fff;font-size:11px; padding:12px 45px; font-weight:bold; text-transform:uppercase;">Kim Broders</a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section" style=" padding-top:70px; padding-bottom:50px;">
        <div class="container">
            <div class="row">
                <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <!--Element Section Start-->
                        <div class="cs-blog cs-blog-grid">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="cs-element-title">
                                    <h2>WHAT'S TRENDING in Car World</h2>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-blog-listing blog-grid">
                                    <div class="cs-media">
                                        <figure> <a href="#"><img src="public/extra-images/blog-listing-1.jpg" alt="" /></a>
                                            <figcaption>
                                                <div class="caption-text"><span>STICKY POST</span></div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="blog-text">
                                        <div class="post-option"> <span class="post-date">Vehicles</span> </div>
                                        <div class="post-title">
                                            <h4><a href="#">Avalon Hybrid Built for the endless weekend.</a></h4>
                                        </div>
                                        <p>Norwegian airline website named Widerøe generated a tremendous amount of buzz and a lot of very happy customers this weekend.</p>
                                        <div class="post-meta">
                                            <figure><img src="public/extra-images/blog-grid-1.jpg" alt="" /></figure>
                                            <span class="post-by">Anselm Hannemann</span> <em>August 15, 2015</em> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-blog-listing blog-grid">
                                    <div class="cs-media">
                                        <figure> <a href="#"><img src="public/extra-images/blog-listing-2.jpg" alt="" /></a>
                                            <figcaption></figcaption>
                                        </figure>
                                    </div>
                                    <div class="blog-text">
                                        <div class="post-option"> <span class="post-date">Motors</span> </div>
                                        <div class="post-title">
                                            <h4><a href="#">Speed Dual-Clutch Featured Special New ReLease</a></h4>
                                        </div>
                                        <p>Website named Widerøe generated a tremendous amount of buzz and a lot of very happy customers this weekend when word got out that supposed.</p>
                                        <div class="post-meta">
                                            <figure><img src="public/extra-images/blog-grid-2.jpg" alt="" /></figure>
                                            <span class="post-by">Arashasghari</span> <em>September 30, 2015</em> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-blog-listing blog-grid">
                                    <div class="cs-media">
                                        <figure> <a href="#"><img src="public/extra-images/blog-listing-3.jpg" alt="" /></a>
                                            <figcaption></figcaption>
                                        </figure>
                                    </div>
                                    <div class="blog-text">
                                        <div class="post-option"> <span class="post-date">Cars and Races</span> </div>
                                        <div class="post-title">
                                            <h4><a href="#">Human laws, but we cannot resist natural ones</a></h4>
                                        </div>
                                        <p>Amount of buzz and a lot of very happy customers this weekend when word got out that supposed unintentional error in their reservation.</p>
                                        <div class="post-meta">
                                            <figure><img src="public/extra-images/blog-grid-3.jpg" alt="" /></figure>
                                            <span class="post-by">Darrellwhitelaw</span> <em>October 9, 2015</em> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cs-seprater" style="text-align:center;"> <span> <i class="icon icon-car228"> </i> </span> </div>
                        <!--Element Section End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section" style="background:#19171a;;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-ad" style="text-align:center; padding:55px 0 25px;">
                        <div class="cs-media">
                            <figure> <a href="#"><img alt="" src="{{asset('public/extra-images/cs-ad-img.jpg')}}"></a> </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop