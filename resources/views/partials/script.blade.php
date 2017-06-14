<script src="{{asset('public/scripts/responsive.menu.js')}}"></script>
<script src="{{asset('public/scripts/chosen.select.js')}}"></script>
<script src="{{asset('public/scripts/slick.js')}}"></script>
<script src="{{asset('public/scripts/echo.js')}}"></script>
<script src="{{asset('public/scripts/bootstrap-slider.js')}}"></script>
<script src="{{asset('public/scripts/toastr.js')}}"></script>
<script src="{{asset('public/scripts/waitMe.js')}}"></script>
<script src="{{asset('public/scripts/jquery.bootgrid.js')}}"></script>
<script src="{{asset('public/scripts/jquery.bootgrid.fa.js')}}"></script>
<script src="{{asset('public/plugins/jquery-validation/js/jquery.validate.js')}}"></script>
<script src="{{asset('public/scripts/sweetalert2.js')}}"></script>
<script src="http://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script src="{{url('/public/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('public/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    var url = "<?= url('/')?>";
</script>
<!-- Put all Functions in functions.js -->
<script src="{{asset('public/scripts/functions.js')}}"></script>
<script src="{{asset('public/scripts/base.js')}}"></script>
@yield('customscript')
