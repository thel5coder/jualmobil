@extends('main')

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
                                    <div class="cs-user-section-title"><h4>Daftar Model</h4>
                                        <div class="pull-right">
                                            <a class="btn btn-success" data-toggle="modal" data-target="#add-model"
                                               aria-hidden="true"> <i class="fa fa-plus-circle"></i> Model </a>
                                        </div>
                                        {{--modal--}}
                                        <div class="modal fade" id="add-model" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Tambah Model</h4>
                                                        <br>
                                                        <form class="user-post-vehicles" id="formModel">

                                                            <div class="cs-field-holder">
                                                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                                    <label>Merk</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                    <div class="cs-field">
                                                                        <select data-placeholder="Pilih Merk" tabindex="1" class="chosen-select"
                                                                                name="merk" id="merk">
                                                                            <option selected> Pilih Merk...</option>
                                                                            @foreach($dataMerks as $dataMerk)
                                                                                <option value="{{$dataMerk->id}}">{{ucfirst($dataMerk->merk)}}</option>
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
                                                                        <input type="text" name="model" id="model">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                                                            <div class="cs-field-holder">
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                                                    <div class="cs-field">
                                                                        <div class="cs-btn-submit">
                                                                            <input type="submit" value="SIMPAN">
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
                                <ul class="cs-featurelisted-car">
                                    @foreach($dataModels as $model)
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-text">
                                                <h6>{{$model->model}}</h6>
                                                <div class="post-options">
                                                    <span>Dibuat <em> {{ $model->created_at->diffForHumans() }}</em></span>
                                                </div>
                                                <div class="cs-post-types">
                                                    <div class="cs-post-list">
                                                        <div class="">
                                                            <a data-toggle="tooltip" data-placement="top"
                                                               title="Delete" class="btn btn-danger"><i class="icon-trash-o"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                {!! $dataModels->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script type="text/javascript">
        $(document).ready(function(){

            $('#formModel').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    merk: {
                        required: true
                    },

                    model: {
                        required: true,
                        minlength: 3
                    }

                },

                messages: {
                    merk: {
                        required: "merk harus di isi"
                    },
                    model: {
                        required: "kondisi harus di isi",
                        minlength: "Minimal 3 Karakter"
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

                    $.ajax({
                        url: "<?= url('backend/model/create')?>",
                        method: "POST",
                        data: {
                            _token: $('#token').val(),
                            merk: $('#merk').val(),
                            model: $('#model').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                window.location.reload();
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