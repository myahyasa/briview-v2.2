<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src={{ asset('assets/js/libs/jquery-3.1.1.min.js') }}></script>
<script src={{ asset('bootstrap/js/popper.min.js') }}></script>
<script src={{ asset('bootstrap/js/bootstrap.min.js') }}></script>
<script src={{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}></script>
<script src={{ asset('assets/js/app.js') }}></script>
<script src={{ asset('plugins/select2/select2.min.js') }}></script>
<script src={{ asset('plugins/select2/custom-select2.js') }}></script>


{{-- <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="../bootstrap/js/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/app.js"></script> --}}

<script>
    $(document).ready(function () {
        App.init();
    });

</script>
<script src={{ asset('plugins/highlight/highlight.pack.js') }}></script>
<script src={{ asset('assets/js/custom.js') }}></script>

{{-- <script src="../plugins/highlight/highlight.pack.js"></script>
<script src="../assets/js/custom.js"></script> --}}

<script src="https://code.jquery.com/jquery.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="../plugins/table/datatable/datatables.js"></script> --}}
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- SCRIPT DATATABLES BOOTSTRAP 4 -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src={{ asset('assets/js/scrollspyNav.js') }}></script>

{{-- <script src="../assets/js/scrollspyNav.js"></script> --}}
<script>
    checkall('todoAll', 'todochkbox');
    $('[data-toggle="tooltip"]').tooltip()

</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
