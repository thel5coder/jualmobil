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
                                    <div class="cs-user-section-title">
                                        <h4>Daftar Iklan Mobil</h4>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tblListingIklan">
                                        <thead>
                                        <tr>
                                            <th data-column-id="judul">Judul</th>
                                            <th data-column-id="kondisi">Kondisi</th>
                                            <th data-column-id="model">Model</th>
                                            <th data-column-id="merk">Merk</th>
                                            <th data-column-id="tipe">Tipe</th>
                                            <th data-column-id="harga">Harga</th>
                                            <th data-column-id="provinsi">Provinsi</th>
                                            <th data-column-id="kota">kota</th>
                                            <th data-column-id="status">status</th>
                                            <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
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
    <script type="text/javascript">
        var urlDetailListingMobil  = "<?= url('/listing/read/')?>";
        $(document).ready(function(){
            paginationTable();
        });
        function paginationTable() {
            var grid = $('#tblListingIklan').bootgrid({
                ajax: true,
                url: "<?= route('pagination') ?>",
                post: function(){
                    return {
                        _token : "<?= csrf_token()?>"
                    };
                },
                formatters: {
                    "aksi": function (column, row)
                    {
                        return "<div class=\"btn-group\">"+
                                "<a href=\"" + urlDetailListingMobil + "/"+row.id+"\" data-row-id=\""+row.id+"\" class=\"btn btn-success btn-sm command-detail\"><i class=\"fa fa-search-plus\"></i> Detail</a>"+
                                "</div>";
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function ()
            {
                $(".dropdown-toggle").dropdown();
                grid.find(".command-delete").on("click", function (e)
                {
                    e.preventDefault();
                    deleteData($(this).data('row-id'));
                    return false;
                });
            });
        }
    </script>
@stop