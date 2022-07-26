<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('dashboard/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('dashboard/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/app-assets/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('dashboard/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<script src="{{asset('dashboard/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
@yield('scripts')
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('dashboard/app-assets/js/scripts/pages/dashboard-crypto.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/app-assets/js/scripts/extensions/toastr.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->


<script>
    @if(session('done'))
        toastr.success("{{session('done')}}", 'الاجراء', {"progressBar": true});
    @endif
    @if(session('failed'))
        toastr.error("{{session('failed')}}", 'الاجراء', {"progressBar": true});
    @endif
</script>
</body>
</html>
