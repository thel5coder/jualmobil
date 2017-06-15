@extends('main')
@section('customstyle')
    <link href="{{asset('public/plugins/select2/css/select2.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('public/css/select2-bootstrap.css')}}">
@stop
@section('content')
    <div class="main-section">
        <div class="page-section"
             style="background:url({{asset('public/extra-images/user-bg-img.jpg')}}) no-repeat;background-size:cover;min-height:175px;margin-top:-30px;margin-bottom:-129px;"></div>
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
                                        <h4>Update Iklan</h4>
                                    </div>
                                </div>
                                <br>
                                <form class="user-post-vehicles" id="formUpdateIklanMobil">
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
                                                <input type="text" name="judul" id="judul"
                                                       value="{{$dataIklan->judul}}">
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
                                        <?php $i = 1 ?>
                                        @foreach($imageIklan as $gambarIklan)
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                <div class="cs-upload-img">
                                                    @if($gambarIklan->images =='')
                                                        <div class="input-group">
                                                           <span class="input-group-btn">
                                                               <img src="https://dummyimage.com/600x400/f23d52/fafafa.png&text=Edited+Gambar+Iklan"
                                                                    id="holder{{$i}}" data-input="thumbnail{{$i}}"
                                                                    data-preview="holder{{$i}}"
                                                                    style="margin-top:15px;max-height:100px;">
                                                           </span>
                                                           <input id="thumbnail{{$i}}" data-image-id="{{$gambarIklan->id}}" value="{{$gambarIklan->images}}" type="hidden" name="filepath">
                                                        </div>
                                                    @else
                                                        <div class="input-group">
                                                           <span class="input-group-btn">
                                                               <img src="{{$gambarIklan->images}}"
                                                                    id="holder{{$i}}" data-input="thumbnail{{$i}}"
                                                                    data-preview="holder{{$i}}"
                                                                    style="margin-top:15px;max-height:100px;">
                                                           </span>
                                                            <input id="thumbnail{{$i}}" type="hidden" data-image-id="{{$gambarIklan->id}}" name="filepath" value="{{$gambarIklan->images}}">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endforeach
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
                                                    <input type="radio" name="kondisi" value="bekas" @if($dataIklan->kondisi == 'bekas') checked @endif> Bekas
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="cs-checkbox">
                                                    <input type="radio" name="kondisi" value="baru" @if($dataIklan->kondisi == 'baru') checked @endif> Baru
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
                                                    <option>Pilih Merk...</option>
                                                    @foreach($merk as $dataMerk)
                                                        <option
                                                                @if($dataMerk->id == $dataIklan->merk_id) selected
                                                                @endif
                                                                value="{{$dataMerk->id}}">
                                                            {{ucfirst($dataMerk->merk)}}
                                                        </option>
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
                                                    <option>Pilih Model...</option>
                                                    @for($i=0;$i<count($model);$i++)
                                                        <option value="{{$model[$i]['id']}}" @if($dataIklan->model_id == $model[$i]['id']) {{ 'selected' }}@endif>{{$model[$i]['text']}}</option>
                                                    @endfor
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
                                                    <option>Pilih Tipe</option>
                                                    @for($i=0;$i<count($tipe);$i++)
                                                        <option value="{{$tipe[$i]['id']}}"
                                                                @if($dataIklan->tipe_id == $tipe[$i]['id']) selected @endif > {{$tipe[$i]['text']}}</option>
                                                    @endfor
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
                                                        <option @if($i == $dataIklan->tahun) selected @endif
                                                        value="{{$i}}">
                                                            {{$i}}
                                                        </option>
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
                                                    <option value="merah"
                                                            @if($dataIklan->warna == 'merah') selected @endif >Merah
                                                    </option>
                                                    <option value="hitam"
                                                            @if($dataIklan->warna == 'hitam') selected @endif >Hitam
                                                    </option>
                                                    <option value="silver"
                                                            @if($dataIklan->warna == 'silver') selected @endif >Silver
                                                    </option>
                                                    <option value="silver metallic"
                                                            @if($dataIklan->warna == 'silver metallic') selected @endif >
                                                        Silver Metallic
                                                    </option>
                                                    <option value="abu abu"
                                                            @if($dataIklan->warna == 'abu abu') selected @endif >Abu abu
                                                    </option>
                                                    <option value="marun"
                                                            @if($dataIklan->warna == 'marun') selected @endif >Marun
                                                    </option>
                                                    <option value="pink"
                                                            @if($dataIklan->warna == 'pink') selected @endif >Pink
                                                    </option>
                                                    <option value="orange"
                                                            @if($dataIklan->warna == 'orange') selected @endif >Orange
                                                    </option>
                                                    <option value="kuning"
                                                            @if($dataIklan->warna == 'kuning') selected @endif >Kuning
                                                    </option>
                                                    <option value="putih"
                                                            @if($dataIklan->warna == 'putih') selected @endif >Putih
                                                    </option>
                                                    <option value="hijau"
                                                            @if($dataIklan->warna == 'hijau') selected @endif >Hijau
                                                    </option>
                                                    <option value="hijau tua"
                                                            @if($dataIklan->warna == 'hijau tua') selected @endif >Hijau
                                                        Tua
                                                    </option>
                                                    <option value="biru"
                                                            @if($dataIklan->warna == 'biru') selected @endif >Biru
                                                    </option>
                                                    <option value="biru tua"
                                                            @if($dataIklan->warna == 'biru tua') selected @endif >Biru
                                                        Tua
                                                    </option>
                                                    <option value="ungu"
                                                            @if($dataIklan->warna == 'ungu') selected @endif >Ungu
                                                    </option>
                                                    <option value="violet"
                                                            @if($dataIklan->warna == 'violet') selected @endif >Violet
                                                    </option>
                                                    <option value="coklat"
                                                            @if($dataIklan->warna == 'coklat') selected @endif >Coklat
                                                    </option>
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
                                                    <option value="Manual"
                                                            @if($dataIklan->transmisi == 'Manual') selected @endif >
                                                        Manual
                                                    </option>
                                                    <option value="automatic"
                                                            @if($dataIklan->transmisi == 'automatic') selected @endif >
                                                        Automatic
                                                    </option>
                                                    <option value="A/T 2-TRONIC"
                                                            @if($dataIklan->transmisi == 'A/T 2-TRONIC') selected @endif >
                                                        A/T 2-TRONIC
                                                    </option>
                                                    <option value="A/T TIPTRONIC"
                                                            @if($dataIklan->transmisi == 'A/T TIPTRONIC') selected @endif >
                                                        A/T TIPTRONIC
                                                    </option>
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
                                                    <option value="bensin"
                                                            @if($dataIklan->bahan_bakar == 'bensin') selected @endif>
                                                        Bensin
                                                    </option>
                                                    <option value="solar"
                                                            @if($dataIklan->bahan_bakar == 'solar') selected @endif>
                                                        Solar
                                                    </option>
                                                    <option value="BBG"
                                                            @if($dataIklan->bahan_bakar == 'BBG') selected @endif>BBG
                                                    </option>
                                                    <option value="hybird"
                                                            @if($dataIklan->bahan_bakar == 'hybird') selected @endif>
                                                        Hybird
                                                    </option>
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
                                                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                                       value="{{$dataIklan->kilo_meter}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Plat Nomor</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="platNomor" id="platNomor"
                                                       value="{{$dataIklan->plat_nomor}}">
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
                                                <input type="text" name="harga" id="harga"
                                                       value="{{$dataIklan->harga}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Provinsi</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select name="provinsi" id="provinsi">
                                                    <option selected>Pilih Provinsi</option>
                                                    @foreach($provinsi as $prov)
                                                        <option @if($prov->nama == $dataIklan->provinsi) selected @endif
                                                        value="{{$prov->id}}">
                                                            {{ucwords($prov->nama)}}
                                                        </option>
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
                                                    <option>Pilih Kota...</option>
                                                    @foreach($kota as $dataKota)
                                                        <option value="{{$dataKota->nama}}"
                                                                @if($dataIklan->kota == $dataKota->nama) selected="" @endif>{{$dataKota->nama}}</option>
                                                    @endforeach
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
                                                <textarea name="deskripsi"
                                                          id="deskripsi">{{$dataIklan->deskripsi}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{csrf_token()}}" id="token" name="_token"/>
                                    <input type="hidden" id="idIklan" value="{{$dataIklan->id}}">
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
        var idCarImage = [];
        $(document).ready(function () {

            $('select').select2({
                theme: 'bootstrap'
            });

            $('input[name=kondisi]').change(function () {
                kondisi = $(this).val();
            });

            $('#holder1').filemanager('image', {prefix: domain});
            $('#holder2').filemanager('image', {prefix: domain});
            $('#holder3').filemanager('image', {prefix: domain});
            $('#holder4').filemanager('image', {prefix: domain});
            $('#holder5').filemanager('image', {prefix: domain});
            $('#holder6').filemanager('image', {prefix: domain});

            $('#merk').change(function (e) {
                $.ajax({
                    url: "<?= url('backend/listing/getmodel')?>/" + $(this).val(),
                    method: 'GET',
                    success: function (s) {
                        $('#model').children('option:not(:first)').remove().end();
                        $('#model').select2({
                            theme: "bootstrap",
                            data: s
                        });
                    }
                });
            });

            $('#model').change(function (e) {
                $.ajax({
                    url: "<?= url('backend/listing/gettipe') ?>/" + $(this).val(),
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

            $('#provinsi').change(function (e) {;
                $.ajax({
                    url: '<?= url('backend/listing/getkota')?>/' + $(this).val(),
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

            $('#formUpdateIklanMobil').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: false,
                messages: false,

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
                        }else{
                            carImage.push('');
                        }
                        idCarImage.push($(this).data('image-id'));
                    });
                    $.ajax({
                        url: "<?= route('updateIklan')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            id : $('#idIklan').val(),
                            judul: $('#judul').val(),
                            idCarImage: idCarImage,
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
                                //window.location = "<?= url('/listing')?>";
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