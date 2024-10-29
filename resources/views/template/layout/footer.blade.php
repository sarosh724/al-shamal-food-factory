<script src="{{asset("assets/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/plugins/jquery-ui/jquery-ui.js")}}"></script>
<script src="{{asset("assets/plugins/popper/popper.js")}}"></script>
<script src="{{asset("assets/plugins/feather-icon/feather.min.js")}}"></script>
<script src="{{asset("assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
<script src='{{ asset("assets/plugins/jquery-validate/jquery.validate.min.js") }}'></script>
<script src="{{asset("assets/plugins/pace/pace.min.js")}}"></script>
<script src="{{asset("assets/plugins/toastr/toastr.min.js")}}"></script>
<script src="{{asset("assets/plugins/countup/counterup.min.js")}}"></script>
<script src="{{asset("assets/plugins/waypoints/waypoints.min.js")}}"></script>
<script src="{{asset("assets/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js")}}"></script>
<script src="{{asset("assets/plugins/sweet-alert/sweetalert2.js")}}"></script>
<script src="{{asset("assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.slimscroll.min.js")}}"></script>
<script src="{{asset("assets/js/highlight.min.js")}}"></script>
<script src="{{asset("assets/js/app.js")}}"></script>
<script src="{{asset("assets/js/custom.js")}}"></script>
<script src="{{asset("assets/js/chart.js")}}"></script>
<script>
    @include('template.partials.response')

    $(document).ready(function () {
    });
</script>
@yield('scripts')
</body>
</html>
