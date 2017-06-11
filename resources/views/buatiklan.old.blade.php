@extends('main')
@section('content')
    <div class="main-section">
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
                                    <div class="cs-user-section-title">
                                        <h4>Buat Iklan Mobil Barus</h4>
                                    </div>
                                </div>
                                <br>
                                <form class="user-post-vehicles">
                                    <div class="cs-field-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h6>Iklan Mobil Anda</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-seprator"></div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>judul</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <input type="text" name="judul" id="">
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
                                                    <input id="thumbnail" class="" type="hidden"
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
                                                    <input id="thumbnail2" class="" type="hidden"
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
                                                    <input id="thumbnail3" class="" type="hidden"
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
                                                    <input id="check1" type="checkbox" name="kondisi" value="bekas">
                                                    <label for="check1">Bekas</label>
                                                </div>
                                            </li>
                                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="cs-checkbox">
                                                    <input id="check2" type="checkbox" name="kondisi" value="baru">
                                                    <label for="check2">Baru</label>
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
                                                <select data-placeholder="Pilih Merk" tabindex="1" class="chosen-select"
                                                        name="merk" id="merk">
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
                                            <div class="cs-field">
                                                <select data-placeholder="Pilih Model" tabindex="1" class="chosen-select">
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Tipe</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field has-error">
                                                <select data-placeholder="Pilih Tipe" tabindex="1" class="chosen-select">
                                                    <option value="United States">Model.01</option>
                                                    <option value="United Kingdom">Model.02</option>
                                                </select>
                                                {{--<span>Please select model</span>--}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Tahun</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select data-placeholder="Tahun" tabindex="1" class="chosen-select" name="tahun">
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
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
                                                <select data-placeholder="Warna" tabindex="1" class="chosen-select">
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
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
                                                <select data-placeholder="Transmisi" tabindex="1" class="chosen-select">
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
                                                <select data-placeholder="Select Make" tabindex="1" class="chosen-select" name="bahanBakar">
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                </select>
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
                                            <label>Price* ($)</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select data-placeholder="Select Make" tabindex="1" class="chosen-select">
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                </select>
                                                <em>Enter valid mileage (1-1000000)</em></div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Lokasi</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <select data-placeholder="Pilih Lokasi" tabindex="1" class="chosen-select" name="lokasi">
                                                    <option value="United States">United States</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Afghanistan">Afghanistan</option>
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
                                                    <option disabled selected>Pilih Kota...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <label>Deskripsi</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="cs-field">
                                                <textarea name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs-field-holder">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                            <div class="cs-field">
                                                <div class="cs-btn-submit">
                                                    <input type="submit" value="SUBMIT & CONTINUE" >
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
                                    <img src="{{asset('public/extra-images/cs-ad-img.jpg')}}" alt="" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection