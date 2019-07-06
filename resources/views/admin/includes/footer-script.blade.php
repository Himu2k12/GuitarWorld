<script src="{{asset('adminAsset/')}}/vendor//jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('adminAsset/')}}/vendor//bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('adminAsset/')}}/vendor//metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('adminAsset/')}}/vendor//raphael/raphael.min.js"></script>
<script src="{{asset('adminAsset/')}}/vendor//morrisjs/morris.min.js"></script>
<script src="{{asset('adminAsset/')}}/data/morris-data.js"></script>

<!-- DataTables JavaScript -->
<script src="{{asset('adminAsset/')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('adminAsset/')}}/dist/js/sb-admin-2.js"></script>

<!-- Flot Charts JavaScript -->
<script src="{{asset('adminAsset/')}}/vendor/flot/excanvas.min.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/flot/jquery.flot.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/flot/jquery.flot.pie.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/flot/jquery.flot.resize.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/flot/jquery.flot.time.js"></script>
<script src="{{asset('adminAsset/')}}/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script src="{{asset('adminAsset/')}}/data/flot-data.js"></script>


<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
 $('#dataTables-example-two').DataTable({
            responsive: true
        });
 $('#dataTables-example-three').DataTable({
            responsive: true
        });
 $('#dataTables-example-four').DataTable({
            responsive: true
        });
        $('#dataTables-example-dealer').DataTable({
            resposive:true
        });
        $('#dataTables-example-customer').DataTable({
            resposive:true
        });
        $('#dataTables-example-GW').DataTable({
            resposive:true
        });

    });
</script>

