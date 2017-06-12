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
                                        <h4>Buat Iklan Mobil Barus</h4>
                                    </div>
                                </div>
                                <br>
                                <form class="user-post-vehicles" id="formIklanMobil">
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Iklan Mobil Anda</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>

                                    <div class="cs-field">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>judul</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field form-group">
                                                <input type="text" name="judul" id="judul">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Upload Images</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="cs-upload-img">
                                                <div class="input-group">
                                                   <span class="input-group-btn">
                                                     <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                       <i class="fa fa-picture-o"></i> Choose
                                                     </a>
                                                   </span>
                                                    <input id="thumbnail" type="hidden"
                                                           name="filepath">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="cs-upload-img">
                                                <div class="input-group">
                                                   <span class="input-group-btn">
                                                     <a id="lfm2" data-input="thumbnail2" data-preview="holder2"
                                                        class="btn btn-primary">
                                                       <i class="fa fa-picture-o"></i> Choose
                                                     </a>
                                                   </span>
                                                    <input id="thumbnail2" type="hidden"
                                                           name="filepath">
                                                </div>
                                                <img id="holder2" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="cs-upload-img">
                                                <div class="input-group">
                                                   <span class="input-group-btn">
                                                     <a id="lfm3" data-input="thumbnail3" data-preview="holder3"
                                                        class="btn btn-primary">
                                                       <i class="fa fa-picture-o"></i> Choose
                                                     </a>
                                                   </span>
                                                    <input id="thumbnail3" type="hidden"
                                                           name="filepath">
                                                </div>
                                                <img id="holder3" style="margin-top:15px;max-height:100px;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Kondisi Mobil</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <ul class="cs-checkbox-list">
                                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="cs-checkbox">
                                                    <input type="radio" name="kondisi" value="bekas" checked> Bekas
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="cs-checkbox">
                                                    <input type="radio" name="kondisi" value="baru"> Baru
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Detail Mobil</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Merk</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="merk" id="merk">
                                                    <option  selected>Pilih Merk...</option>
                                                    @foreach($datas as $data)
                                                        <option value="{{$data->id}}">{{ucwords($data->merk)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Model</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field" id="selectModel">
                                                <select name="model" id="model">
                                                    <option selected>Pilih Model...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Tipe</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="tipe" id="tipe">
                                                    <option selected>Pilih Tipe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Tahun</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="tahun" id="tahun">
                                                    @for($i = date('Y') ; $i > 1800; $i--)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Warna</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select data-placeholder="Warna" tabindex="1" class="select"
                                                        name="warna" id="warna">
                                                    <option value="merah">Merah</option>
                                                    <option value="hitam">Hitam</option>
                                                    <option value="silver">Silver</option>
                                                    <option value="silver metallic">Silver Metallic</option>
                                                    <option value="abu abu">Abu abu</option>
                                                    <option value="marun">Marun</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="kuning">Kuning</option>
                                                    <option value="putih">Putih</option>
                                                    <option value="hijau">Hijau</option>
                                                    <option value="hijau tua">Hijau Tua</option>
                                                    <option value="biru">Biru</option>
                                                    <option value="biru tua">Biru Tua</option>
                                                    <option value="ungu">Ungu</option>
                                                    <option value="violet">Violet</option>
                                                    <option value="coklat">Coklat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Transmisi</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="transmisi" id="transmisi">
                                                    <option value="Manual">Manual</option>
                                                    <option value="automatic">Automatic</option>
                                                    <option value="A/T 2-TRONIC">A/T 2-TRONIC</option>
                                                    <option value="A/T TIPTRONIC">A/T TIPTRONIC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Bahan Bakar</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="bahanBakar" id="bahanBakar">
                                                    <option value="bensin">Bensin</option>
                                                    <option value="solar">Solar</option>
                                                    <option value="BBG">BBG</option>
                                                    <option value="hybird">Hybird</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Kilo Meter</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="kiloMeter" id="kiloMeter"
                                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Plat Nomor</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="platNomor" id="platNomor">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Lain Lain</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Harga</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="harga" id="harga">
                                                <em>Enter valid mileage (1-1000000)</em></div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Provinsi</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="provinsi" id="provinsi">
                                                    <option  selected>Pilih Provinsi</option>
                                                    @foreach($provinsi as $prov)
                                                        <option value="{{$prov->id}}" data-namaprovinsi="{{$prov->nama}}">{{ucwords($prov->nama)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Kota</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="kota" id="kota">
                                                    <option selected disabled selected>Pilih Kota...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <textarea name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" name="_token"/>
                                    <input type="hidden" name="status" id="status" value="moderasi">
                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                            <div class="cs-field">
                                                <div class="cs-btn-submit">
                                                    <input type="submit" id="btnSubmit" value="SIMPAN">
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
        var domain = "jualmobil";
        var kondisi = 'bekas';
        var carImage = [];
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap'
            });

            $('input[name=kondisi]').change(function () {
                kondisi = $(this).val();
            });

            $('#lfm').filemanager('image', {prefix: domain});
            $('#lfm2').filemanager('image', {prefix: domain});
            $('#lfm3').filemanager('image', {prefix: domain});

            $('#merk').change(function (e) {
                console.log($(this).val());
                $.ajax({
                    url: "<?= url('/listing/getmodel')?>/" + $(this).val(),
                    method: 'GET',
                    success: function (s) {
                        $('#model').children('option:not(:first)').remove().end();
                        console.log(s);
                        $('#model').select2({
                            theme: "bootstrap",
                            data: s
                        });
                    }
                });
            });

            $('#model').change(function (e) {
                $.ajax({
                    url: "<?= url('/listing/gettipe') ?>/" + $(this).val(),
                    method: 'GET',
                    success: function (s) {
                        $('#tipe').children('option:not(:first)').remove().end();
                        $('#tipe').select2({
                            theme: 'bootstrap',
                            data: s
                        });
                    }
                });
            });

            $('#provinsi').change(function (e) {
//                console.log();
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

            $('#formIklanMobil').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    judul: {
                        required: true,
                        minlength: 10
                    },
                    kondisi: {
                        required: true
                    },
                    merk: {
                        required: true
                    },
                    model: {
                        required: true
                    },
                    tipe: {
                        required: true
                    },
                    tahun: {
                        required: true
                    },
                    warna: {
                        required: true
                    },
                    transmisi: {
                        required: true
                    },
                    bahanBakar: {
                        required: true
                    },
                    platNomor: {
                        required: true
                    },
                    kiloMeter: {
                        required: true
                    },
                    harga: {
                        required: true
                    },
                    provinsi: {
                        required: true
                    },
                    kota: {
                        required: true
                    },
                    deskripsi: {
                        required: true
                    }
                },

                messages: {
                    judul: {
                        required: "judul harus di isi",
                        minlength: "judul minimal 10 karakter"
                    },
                    kondisi: {
                        required: "kondisi harus di isi"
                    },
                    merk: {
                        required: "merk harus di isi"
                    },
                    model: {
                        required: "model harus di isi"
                    },
                    tipe: {
                        required: "tipe harus di isi"
                    },
                    tahun: {
                        required: "tahun harus di isi"
                    },
                    warna: {
                        required: "warna harus di isi"
                    },
                    transmisi: {
                        required: "transmisi harus di isi"
                    },
                    bahanBakar: {
                        required: "bahan bakar harus di isi"
                    },
                    platNomor: {
                        required: "plat nomor harus diisi"
                    },
                    kiloMeter: {
                        required: "plat nomor harus diisi"
                    },
                    harga: {
                        required: "harga harus di isi"
                    },
                    provinsi: {
                        required: "provinsi harus di isi"
                    },
                    kota: {
                        required: "kota bakar harus di isi"
                    },
                    deskripsi: {
                        required: "deskripsi bakar harus di isi"
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
                    runWaitMe('body', 'roundBounce', 'Menyimpan Data...');
                    $('input[name=filepath]').each(function () {
                        if ($(this).val() != '') {
                            carImage.push($(this).val());
                        }
                    });
                    $.ajax({
                        url: "<?= url('listing/create')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            judul: $('#judul').val(),
                            kondisi: kondisi,
                            carImageList: carImage,
                            merk: $('#merk').val(),
                            model: $('#model').val(),
                            tipe: $('#tipe').val(),
                            tahun: $('#tahun').val(),
                            warna: $('#warna').val(),
                            transmisi: $('#transmisi').val(),
                            platNomor: $('#platNomor').val(),
                            kiloMeter: $('#kiloMeter').val(),
                            bahanBakar: $('#bahanBakar').val(),
                            harga: $('#harga').val(),
                            provinsi: $('#provinsi option:selected').text(),
                            kota: $('#kota option:selected').text(),
                            deskripsi: $('#deskripsi').val()
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
@stop
