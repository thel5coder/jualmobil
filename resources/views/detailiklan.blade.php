<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoMobile</title>
    @include('partials.style')
</head>
<body class="wp-automobile single-page">
<div class="wrapper">
    <!-- Header Start -->
@include('partials.header')
<!-- Header End -->
    <!-- Single - Page Slider Start -->
    <div class="cs-banner loader">
        <ul class="cs-banner-slider">
            @foreach($imageIklan as $imageIklan)
            <li>
                <div class="cs-media">
                    <figure><img data-echo="{{$imageIklan->images}}"  src="{{$imageIklan->images}}"  alt=""/></figure>
                </div>
            </li>
           @endforeach
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                    <div class="cs-button-style">
                        <a class="btn-video" href="#"><i class="icon-play_arrow"></i> Watch video</a>
                        <a class="btn-compare" href="#"><i class="icon-flow-tree"></i> Compare</a>
                        <a class="btn-shortlist" href="#"><i class="icon-heart-o"></i> shortlist</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single - Page Slider End -->

    <!-- Main Start -->
    <div class="main-section">
        <div class="page-section" style="box-shadow: 0 2px 3px -2px rgba(0,0,0,0.4);position:relative;">
            <div class="container">
                <div class="row">
                    <div class="custom-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="page-section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="car-detail-heading">
                                        <div class="auto-text">
                                            <h2>{{$iklan->judul}}</h2>
                                            <span><i class="icon-building-o"></i> {{$iklan->warna}}</span>
                                            <address><i class="icon-location"></i>{{$iklan->provinsi}}
                                                - {{$iklan->kota}}</address>
                                        </div>
                                        <div class="auto-price"><span class="cs-color">{{$iklan->harga}}</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-detail-nav">
                                        <ul>
                                            <li><a class="active" href="#vehicle">Deskripsi</a></li>
                                            <li><a href="#specification">Spesikasi Mobil</a></li>
                                            <li><a href="#contact">Kontak</a></li>
                                        </ul>
                                        <div class="detail-btn">
                                            <div class="cs-button-style">
                                                @if(auth()->user()->tipe_user == 'admin')
                                                    <a class="btn-compare" href="#"><i class="fa fa-close"></i>
                                                        Tolak </a>
                                                    <a class="btn-shortlist" href="#"><i class="fa fa-check"></i>
                                                        Aktifkan </a>
                                                @else
                                                    <a class="btn-compare" href="#"><i class="icon-flow-tree"></i>
                                                        Compare</a>
                                                    <a class="btn-shortlist" href="#"><i class="icon-heart-o"></i>
                                                        shortlist</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="on-scroll">
                                        <div id="vehicle" class="auto-overview detail-content">
                                            <ul class="row">
                                                <li class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-car cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Merk</span>
                                                        <strong>{{$iklan->merk}}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-vehicle92 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Kilo Meter</span>
                                                        <strong>{{$iklan->kilo_meter}}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-engine cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Transmisi</span>
                                                        <strong>{{$iklan->transmisi}}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-gas20 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Bahan Bakar</span>
                                                        <strong>{{$iklan->bahan_bakar}}</strong>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="more-text">
                                                {{$iklan->deskripsi}}
                                            </p>
                                            <a id="load-text" href="" class="btn-show-more cs-color"> + Show More</a>
                                        </div>
                                        <div id="specification" class="auto-specifications detail-content">
                                            <div class="section-title" style="text-align:left;">
                                                <h4>Technical Specifications</h4>
                                            </div>
                                            <ul class="row">
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="element-title">
                                                        <i class="cs-color icon-engine"></i>
                                                        <span>Engine and Drive Train</span>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Number of cylinders</span>
                                                                <strong>825 KG</strong>
                                                            </li>
                                                            <li>
                                                                <span>Displacement</span>
                                                                <strong>KM/L</strong>
                                                            </li>
                                                            <li>
                                                                <span>Drive layout</span>
                                                                <strong>4 doors</strong>
                                                            </li>
                                                            <li>
                                                                <span>Horespower</span>
                                                                <strong>1670 mm</strong>
                                                            </li>
                                                            <li>
                                                                <span>@ rpm</span>
                                                                <strong>3600 mm</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Weight</span>
                                                                <strong>Est. 42 mpg</strong>
                                                            </li>
                                                            <li>
                                                                <span>Mileage</span>
                                                                <strong>ECO driving mode</strong>
                                                            </li>
                                                            <li>
                                                                <span>No of Doors</span>
                                                                <strong>Standard Bluetooth®</strong>
                                                            </li>
                                                            <li>
                                                                <span>Height</span>
                                                                <strong>Backup camera</strong>
                                                            </li>
                                                            <li>
                                                                <span>Length</span>
                                                                <strong>Voice recognitioN</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="contact" class="cs-contact-form detail-content">
                                            <div class="section-title">
                                                <h4 style="text-align:left;">Contact Us</h4>
                                            </div>
                                            <form>
                                                <input type="text" placeholder="Full Name">
                                                <input type="email" placeholder="Email Address">
                                                <input type="text" placeholder="Phone Number">
                                                <textarea placeholder="Your Message"></textarea>
                                                <button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Aktifkan</button>
                                                <button type="button" class="btn btn-danger"><i class="fa fa-close"></i> Tolak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="cs-category-link-icon">
                            <ul>
                                <li><a href="assets/extra-images/pdf-sample.pdf" download><i
                                                class="cs-color icon-print3"></i>Print this Detail</a></li>
                                <li><a data-toggle="modal" href="remote.html" data-target="#email-to-friend"><i
                                                class="fa fa-share-alt"></i>Share</a></li>
                            </ul>
                        </div>
                        <div class="auto-detail-filter">
                            <div class="element-title">
                                <h6><i class="cs-bgcolor icon-line-graph"></i> Financing calculator</h6>
                            </div>
                            <div class="auto-filter">
                                <form>
                                    <ul>
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="auto-field">
                                                <label>Vehicle price <span class="cs-color"> (&#x24;)</span></label>
                                                <select data-placeholder="$25,000" style="width:100%;"
                                                        class="chosen-select" tabindex="5">
                                                    <option>$30,000</option>
                                                    <option>$35,000</option>
                                                    <option>$45,000</option>
                                                    <option>$55,000</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="auto-field">
                                                <label>Interest rate <span class="cs-color"> (&#x25;)</span></label>
                                                <select data-placeholder="50%" style="width:100%;" class="chosen-select"
                                                        tabindex="5">
                                                    <option>30%</option>
                                                    <option>35%</option>
                                                    <option>45%</option>
                                                    <option>55%</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="auto-field">
                                                <label>Period <span class="cs-color"> (month)</span></label>
                                                <span id="ex6CurrentSliderValLabel"><span id="ex6SliderVal">9</span> Months</span>
                                                <input id="ex6" type="text" data-slider-min="0" data-slider-max="12"
                                                       data-slider-step="1" data-slider-value="9"/>
                                            </div>
                                        </li>
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="auto-field">
                                                <label>Down Payment<span class="cs-color"> (&#x25;)</span></label>
                                                <input type="text" placeholder="$326,500">
                                            </div>
                                        </li>
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="auto-field">
                                                <input class="cs-bgcolor" type="submit" value="Calculate">
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="page-section" style="margin-bottom:30px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div style="text-align:left;" class="cs-section-title">
                            <h3>Related Cars</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="auto-listing auto-grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/extra-images/listing-Grid-img1.jpg" alt="#"/>
                                </figure>
                            </div>
                            <div class="auto-text">
                                <span class="cs-categories"><a href="#">Timlers Motors</a></span>
                                <div class="post-title">
                                    <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                                    <div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em>
                                    </div>
                                </div>
                                <div class="btn-list">
                                    <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse"
                                       data-target="#list-view"></a>
                                    <div id="list-view" class="collapse">
                                        <ul>
                                            <li>30/36 est. mpg 18</li>
                                            <li>Black front grille with chrome accent</li>
                                            <li>Cruise control</li>
                                            <li>Remote keyless entry system</li>
                                            <li>Tilt 3-spoke steering wheel with audio controls</li>
                                            <li>15-in. alloy wheels</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cs-checkbox">
                                    <input type="checkbox" name="list" value="check-listn" id="check-list">
                                    <label for="check-list">Compare</label>
                                </div>
                                <a href="#" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="auto-listing auto-grid">
                            <div class="cs-media">
                                <figure><img src="assets/extra-images/listing-Grid-img2.jpg" alt="#"/></figure>
                            </div>
                            <div class="auto-text">
                                <span class="cs-categories"><a href="#">Timlers Motors</a></span>
                                <div class="post-title">
                                    <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                                    <div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em>
                                    </div>
                                </div>
                                <div class="btn-list">
                                    <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse"
                                       data-target="#list-view1"></a>
                                    <div id="list-view1" class="collapse">
                                        <ul>
                                            <li>30/36 est. mpg 18</li>
                                            <li>Black front grille with chrome accent</li>
                                            <li>Cruise control</li>
                                            <li>Remote keyless entry system</li>
                                            <li>Tilt 3-spoke steering wheel with audio controls</li>
                                            <li>15-in. alloy wheels</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cs-checkbox">
                                    <input type="checkbox" name="list" value="check-listn" id="check-list1">
                                    <label for="check-list1">Compare</label>
                                </div>
                                <a href="#" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="auto-listing auto-grid">
                            <div class="cs-media">
                                <figure><img src="assets/extra-images/listing-Grid-img3.jpg" alt="#"/></figure>
                            </div>
                            <div class="auto-text">
                                <span class="cs-categories"><a href="#">Timlers Motors</a></span>
                                <div class="post-title">
                                    <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                                    <div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em>
                                    </div>
                                </div>
                                <div class="btn-list">
                                    <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse"
                                       data-target="#list-view2"></a>
                                    <div id="list-view2" class="collapse">
                                        <ul>
                                            <li>30/36 est. mpg 18</li>
                                            <li>Black front grille with chrome accent</li>
                                            <li>Cruise control</li>
                                            <li>Remote keyless entry system</li>
                                            <li>Tilt 3-spoke steering wheel with audio controls</li>
                                            <li>15-in. alloy wheels</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cs-checkbox">
                                    <input type="checkbox" name="list" value="check-listn" id="check-list2">
                                    <label for="check-list2">Compare</label>
                                </div>
                                <a href="#" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="auto-listing auto-grid">
                            <div class="cs-media">
                                <figure><img src="assets/extra-images/listing-Grid-img4.jpg" alt="#"/></figure>
                            </div>
                            <div class="auto-text">
                                <span class="cs-categories"><a href="#">Timlers Motors</a></span>
                                <div class="post-title">
                                    <h6><a href="#">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
                                    <div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em>
                                    </div>
                                </div>
                                <div class="cs-checkbox">
                                    <input type="checkbox" name="list" value="check-listn" id="check-list3">
                                    <label for="check-list3">Compare</label>
                                </div>
                                <a href="#" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a>
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
                                    <img src="assets/extra-images/cs-ad-img.jpg" alt=""/>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main End -->

    <!-- Footer Start -->
@include('partials.footer')
<!-- Footer End -->
</div>

@include('partials.script')

</body>
</html>