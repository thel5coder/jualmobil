@extends('main')
@section('customstyle')
    <link rel="stylesheet" href="{{asset('public/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/select2/css/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/css/select2-bootstrap.css')}}">
@stop
@section('content')
    <!-- Main Start -->
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="cs-listing-filters">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingfoure">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapsefoure"
                                           aria-expanded="false" aria-controls="collapsefoure">
                                            Kondisi
                                        </a>
                                    </div>
                                    <div id="collapsefoure" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingfoure">
                                        <div class="panel-body">
                                            <div class="cs-select-transmission">
                                                <form>
                                                    <input id="checkbox16" type="radio" value="Speed" name="kondisi">
                                                    <label for="checkbox16">Baru</label>
                                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                                    <input id="checkbox17" type="radio" value="Speed" name="kondisi">
                                                    <label for="checkbox17">Bekas</label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            Model year
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="cs-model-year">
                                                <div class="cs-select-filed">
                                                    <select data-placeholder="Recent Added"
                                                            class="chosen-select-no-single" tabindex="5">
                                                        <option>2003</option>
                                                        <option>2004</option>
                                                        <option>2005</option>
                                                        <option>2006</option>
                                                    </select>
                                                </div>
                                                <span>to</span>
                                                <div class="cs-select-filed">
                                                    <select data-placeholder="Recent Added"
                                                            class="chosen-select-no-single" tabindex="5">
                                                        <option>2006</option>
                                                        <option>2005</option>
                                                        <option>2004</option>
                                                        <option>2003</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <a role="button" data-toggle="collapse" aria-expanded="true" href="#collapseTwo"
                                           aria-controls="collapseTwo">
                                            Merk
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="cs-select-filed ">
                                                <select class="select2">
                                                    <option selected>Pilih Merk...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTree">
                                        <a role="button" data-toggle="collapse" aria-expanded="true"
                                           href="#collapseTree"
                                           aria-controls="collapseTree">
                                            Model
                                        </a>
                                    </div>
                                    <div id="collapseTree" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="cs-select-filed">
                                                <select class="select2">
                                                    <option selected>Pilih Model...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFor">
                                        <a role="button" data-toggle="collapse" aria-expanded="true" href="#collapseFor"
                                           aria-controls="collapseFor">
                                            Tipe
                                        </a>
                                    </div>
                                    <div id="collapseFor" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="cs-select-filed">
                                                <select class="select2">
                                                    <option selected>Pilih Tipe...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <a role="button" data-toggle="collapse" aria-expanded="true"
                                           href="#collapseFive"
                                           aria-controls="collapseFive">
                                            Bahan Bakar
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="cs-select-filed">
                                                <select class="select2">
                                                    <option selected>Bahan Bakar...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                        <a role="button" data-toggle="collapse" aria-expanded="true" href="#collapseSix"
                                           aria-controls="collapseSix">
                                            Bahan Bakar
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <div class="cs-select-filed">
                                                <select class="select2">
                                                    <option selected>Pilih Bahan Bakar...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSeven">
                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapseSeven"
                                           aria-expanded="false" aria-controls="collapseSeven">
                                            PRICE RANGE
                                        </a>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse in" role="tabpanel"
                                         aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <div class="cs-price-range">
                                                <form>
                                                    <input id="price" type="text" class="span2" value="3000"
                                                           data-slider-min="10" data-slider-max="1000"
                                                           data-slider-step="5" data-slider-value="[600,200]"/>
                                                    <div class="selector-value">
                                                        <span>$60,000</span>
                                                        <span class="pull-right">$20,000</span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="auto-sort-filter">
                                    <div class="auto-show-resuilt">
                                        <span>SHOWING <em>25</em> RESULTS FOR YOUR SEARCH</span></div>
                                    <div class="auto-list">
                                        <span>Sort</span>
                                        <ul>
                                            <li>
                                                <div class="cs-select-post">
                                                    <select data-placeholder="Recent Added"
                                                            class="chosen-select-no-single" tabindex="5">
                                                        <option>Recent Added</option>
                                                        <option>Recent Added</option>
                                                        <option>Recent Added</option>
                                                        <option>Recent Added</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li><a href="#"><i class=" icon-view_module"></i></a></li>
                                            <li><a href="#"><i class="icon-view_array"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="auto-your-search">
                                    <ul class="filtration-tags">
                                        <li><a href="#">Hybrid <i class="icon-cross2"></i></a></li>
                                        <li><a href="#">Bmw<i class="icon-cross2"></i></a></li>
                                        <li><a href="#">Compact hatchbac<i class="icon-cross2"></i></a></li>
                                    </ul>
                                    <a href="#" class="clear-tags cs-color">Clear Filters</a>
                                </div>
                            </div>
                            @foreach($dataIklan as $iklan)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="auto-listing auto-grid">
                                        <div class="cs-media auto-media-slider">
                                            @foreach($dataImageIklan[$iklan->id] as $image)
                                                @if($image->images != "" )
                                                <figure>
                                                    <img src="{{$image->images}}" alt="#" width="255" height="220"/>
                                                </figure>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="auto-text">
                                            <span class="cs-categories"><a href="#">{{$iklan->name}}</a></span>
                                            <div class="post-title">
                                                <h4><a href="#">{{$iklan->judul}}</a></h4>
                                                <h6><a href="#">{{$iklan->judul}}</a></h6>
                                                <div class="auto-price"><span class="cs-color">$30,000</span> <em>MSRP
                                                        $33,000</em></div>
                                            </div>
                                            <ul class="auto-info-detail">
                                                <li>Tahun<span>{{$iklan->tahun}}</span></li>
                                                <li>Transmisi<span>{{$iklan->transmisi}}</span></li>
                                                <li>Bahan Bakar<span>{{$iklan->bahan_bakar}}</span></li>
                                            </ul>
                                            <a href="#" class="View-btn">View Detail<i
                                                        class=" icon-arrow-long-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <nav>
                                    <ul class="pagination">
                                        <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i
                                                            class="icon-angle-left"></i></span></a></li>
                                        <li><a class="active">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#" aria-label="Next"><span aria-hidden="true"><i
                                                            class="icon-angle-right"></i></span></a>
                                        </li>
                                    </ul>
                                </nav>
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
    <!-- Main End -->
@stop
@section('customscript')
    <script type="text/javascript" src="{{asset('public/scripts/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/plugins/select2/js/select2.js')}}"></script>
    <script type="text/javascript">
        var domain = "jualmobil";
        var kondisi = 'bekas';
        var carImage = [];
        $(document).ready(function () {
            $('.select2').select2({
                theme: 'bootstrap'
            });
        });
    </script>
@stop
