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


    <!-- Main Start -->
    <div class="main-section">
        <div class="page-section" style="box-shadow: 0 2px 3px -2px rgba(0,0,0,0.4);position:relative;">
            <div class="container">
                <div class="row">
                    <div class="custom-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <ul class="blog-detail-slider" style="margin-bottom:30px;">
                            @foreach($imageIklan as $imageiklan)
                                @if($imageiklan->images != "" )
                                    <li>
                                        <figure><img src="{{$imageiklan->images}}" alt="" width="800" height="485"/>
                                        </figure>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="page-section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="car-detail-heading">
                                        <div class="auto-text">
                                            <h2>{{$iklan->judul}}</h2>
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
                                                    @if($iklan->status == 'moderasi')
                                                        <button class="btn btn-compare" onclick="rejectIklan()"><i
                                                                    class="fa fa-close"></i>
                                                            Tolak
                                                        </button>
                                                        <button class="btn btn-shortlist" onclick="acceptIklan()"><i
                                                                    class="fa fa-check"></i>
                                                            Aktifkan
                                                        </button>
                                                    @endif
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
                                                        <figure><i class="icon-car230 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Model</span>
                                                        <strong>{{$iklan->model}}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-car228 cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Tipe</span>
                                                        <strong>{{$iklan->tipe}}</strong>
                                                    </div>
                                                </li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                    <div class="cs-media">
                                                        <figure><i class="icon-colours cs-color"></i></figure>
                                                    </div>
                                                    <div class="auto-text">
                                                        <span>Warna</span>
                                                        <strong>{{$iklan->warna}}</strong>
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
                                                <h4>Spesifikasi Teknis</h4>
                                            </div>
                                            <ul class="row">
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="element-title">
                                                        <i class="cs-color icon-engine"></i>
                                                        <span>Mobil & Mesin</span>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Kondisi</span>
                                                                <strong>{{$iklan->kondisi}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Transmisi</span>
                                                                <strong>{{$iklan->transmisi}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Kilo Meter</span>
                                                                <strong>{{$iklan->kilo_meter}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Bahan Bakar</span>
                                                                <strong>{{$iklan->bahan_bakar}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Plat Nomor</span>
                                                                <strong>{{$iklan->plat_nomor}}</strong>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>Merk</span>
                                                                <strong>{{$iklan->merk}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Model</span>
                                                                <strong>{{$iklan->model}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Tipe</span>
                                                                <strong>{{$iklan->tipe}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Tahun</span>
                                                                <strong>{{$iklan->tahun}}</strong>
                                                            </li>
                                                            <li>
                                                                <span>Daerah</span>
                                                                <strong>{{$iklan->kota}}</strong>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="contact" class="auto-specifications detail-content">
                                            <ul class="row">
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="element-title">
                                                        <i class="cs-color icon-engine"></i>
                                                        <span>Kontak</span>
                                                    </div>
                                                </li>
                                                <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="specifications-info">
                                                        <ul>
                                                            <li>
                                                                <span>User</span>
                                                                <strong>{{$iklan->name}}</strong>
                                                            </li>
                                                            @if($iklan->phone !== '')
                                                                <li>
                                                                    <span>Phone</span>
                                                                    <strong>{{$iklan->phone}}</strong>
                                                                </li>
                                                            @endif
                                                            @if($iklan->in_wa !== '')
                                                                <li>
                                                                    <span>Whatsapp</span>
                                                                    <strong>{{$iklan->phone}}</strong>
                                                                </li>
                                                            @endif
                                                            @if($iklan->pin_bbm !== '')
                                                                <li>
                                                                    <span>BBM</span>
                                                                    <strong>{{$iklan->pin_bbm }}</strong>
                                                                </li>
                                                            @endif
                                                            @if($iklan->facebook !== '')
                                                                <li>
                                                                    <span>Facebook</span>
                                                                    <strong>{{$iklan->facebook}}</strong>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </li>
                                                @if(auth()->check())
                                                    @if(auth()->user()->tipe_user == "admin" )
                                                        @if($iklan->status == 'moderasi')
                                                            <li class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                                <button type="button" class="btn btn-primary"
                                                                        onclick="acceptIklan()"><i
                                                                            class="fa fa-check"></i> Aktifkan
                                                                </button>
                                                                <button type="button" class="btn btn-danger"
                                                                        onclick="rejectIklan()"><i
                                                                            class="fa fa-close"></i> Tolak
                                                                </button>
                                                            </li>
                                                            <input type="hidden" name="_token" id="token"
                                                                   value="{{csrf_token()}}">
                                                            <input type="hidden" name="id" value="{{$iklan->id}}"
                                                                   id="id">
                                                            <input type="hidden" value="{{$iklan->email}}" id="email">
                                                            <input type="hidden" value="{{$iklan->name}}" id="name">
                                                        @else
                                                            @if($iklan->status == 'nonaktif')
                                                                <strong>Iklan <span
                                                                            class="label label-danger">{{$iklan->status}}</span></strong>
                                                            @else
                                                                <strong>Iklan <span
                                                                            class="label label-success">{{$iklan->status}}</span></strong>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="cs-category-link-icon">
                            <ul>
                                <li><a href="public/extra-images/pdf-sample.pdf" download>
                                        <i class
                                           ="cs-color icon-print3"></i>Print this Detail</a></li>
                                <li><a data-toggle="modal" href="remote.html" data-target="#email-to-friend"><i
                                                class="fa fa-share-alt"></i>Share</a></li>
                            </ul>
                        </div>
                        <div class="auto-detail-filter">
                            <div class="element-title">
                                <h6><i class="cs-bgcolor icon-line-graph"></i> Financing calculator</h6>
                            </div>
                            <div class="auto-filter">
                                <ul>
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Harga Mobil <span class="cs-color"> (&#x24;)</span></label>
                                            <input type="text" disabled value="{{$iklan->harga}}" id="harga">
                                        </div>
                                    </li>
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Bunga <span class="cs-color"> (&#x25;)</span></label>
                                            <input type="text" id="bunga">
                                        </div>
                                    </li>
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Periode Cicilan <span class="cs-color"> (bulan)</span></label>
                                            <select style="width:100%;" class="chosen-select" id="periodeCicilan">
                                                <option value="6">6</option>
                                                <option value="12">12</option>
                                                <option value="18">18</option>
                                                <option value="24">24</option>
                                                <option value="36">36</option>
                                                <option value="48">48</option>
                                                <option value="60">60</option>
                                            </select>
                                        </div>
                                    </li>

                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Uang Muka<span class="cs-color"> Rp.</span></label>
                                            <input type="text" id="uangmuka">
                                        </div>
                                    </li>

                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Bunga Perbulan<span class="cs-color">Rp.</span></label>
                                            <input type="text" id="bungaPerBulan">
                                        </div>
                                    </li>
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Pokok<span class="cs-color">Rp.</span></label>
                                            <input type="text" id="pokok">
                                        </div>
                                    </li>
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <label>Total<span class="cs-color"> Rp.</span></label>
                                            <input type="text" id="total">
                                        </div>
                                    </li>
                                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="auto-field">
                                            <input class="cs-bgcolor" type="submit" value="Hitung" id="hitung"
                                                   onclick="hitung()">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <div class="page-section" style="margin-top:30px;">
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
                                    <img src="{{asset('public/extra-images/listing-Grid-img1.jpg')}}" alt="#"/>
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
    <!-- Main End -->

    <!-- Footer Start -->
@include('partials.footer')
<!-- Footer End -->
</div>

@include('partials.script')
<script type="text/javascript">
    function hitung() {
        var harga = $('#harga').val();
        var bunga = $('#bunga').val();
        var uangMuka = $('#uangmuka').val();
        var periodeCicilan = $('#periodeCicilan').val();
        var total, pokok, bungaPerBulan;
        bungaPerBulan = (harga - uangMuka) * (bunga / 100);
        console.log(periodeCicilan);
        pokok = (harga - uangMuka) / periodeCicilan;
        total = bungaPerBulan + pokok;
        $('#bungaPerBulan').val(Math.round(bungaPerBulan));
        $('#pokok').val(Math.round(pokok));
        $('#total').val(Math.round(total));
    }
    function rejectIklan() {
        swal({
            title: 'Reject Iklan Ini ?! ',
            text: "Tulis alasan mengapa iklan ditolak",
            type: 'warning',
            input: 'textarea',
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            showLoaderOnConfirm: true,
        }).then(function (input) {
            runWaitMe('body', 'roundBounce', 'Set reject Data...');
            $.ajax({
                url: "<?= route('setStatusIklan')?>",
                method: "POST",
                data: {
                    _token: $('#token').val(),
                    id: $('#id').val(),
                    alasan: input,
                    status: 'nonaktif',
                    name: $('#name').val(),
                    email: $('#email').val()
                },
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    $('body').waitMe('hide');
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.isSuccess) {
                        window.location.reload()
                    } else {
                        $('body').waitMe('hide');
                        var errorMessagesCount = s.message.length;
                        for (var i = 0; i < errorMessagesCount; i++) {
                            notificationMessage(s.message[i], 'error');
                        }
                    }
                }
            });
        });
    }
    function acceptIklan() {
        swal({
            title: 'Aktifkan Iklan ',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aktfkan!'
        }).then(function () {
            runWaitMe('body', 'roundBounce', 'Set Aktif Data...');
            $.ajax({
                url: "<?= route('setStatusIklan')?>",
                method: 'POST',
                data: {
                    _token: $('#token').val(),
                    id: $('#id').val(),
                    status: 'aktif',
                    name: $('#name').val(),
                    email: $('#email').val()
                },
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    $('body').waitMe('hide');
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.isSuccess) {
                        window.location.reload()
                    } else {
                        $('body').waitMe('hide');
                        var errorMessagesCount = s.message.length;
                        for (var i = 0; i < errorMessagesCount; i++) {
                            notificationMessage(s.message[i], 'error');
                        }
                    }
                }
            });
        });
    }
</script>
</body>
</html>