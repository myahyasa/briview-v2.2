{{-- jika pakai route group, untuk akses public pakai ../ --}}

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href={{ asset('bootstrap/css/bootstrap.min.css') }} rel="stylesheet" type="text/css" />
<link href={{ asset('assets/css/plugins.css') }} rel="stylesheet" type="text/css" />

{{-- <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
{{-- <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" /> --}}
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href={{ asset('plugins/apex/apexcharts.css') }} rel="stylesheet" type="text/css">
<link href={{ asset('assets/css/dashboard/dash_1.css') }} rel="stylesheet" type="text/css" />

{{-- <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
<link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" /> --}}
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link href={{ asset('assets/css/scrollspyNav.css') }} rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href={{ asset('assets/css/forms/theme-checkbox-radio.css') }}>
<link href={{ asset('assets/css/tables/table-basic.css') }} rel="stylesheet" type="text/css" />

{{-- <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../assets/css/forms/theme-checkbox-radio.css">
<link href="../assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" /> --}}
<!-- END PAGE LEVEL CUSTOM STYLES -->

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- DataTables Bootstrap 4 -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />

{{-- Select2 --}}
<link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">


{{-- BEGIN HR STYLE --}}
<style>
    hr {
        border: 1px solid #1b55e2;
    }

</style>
{{-- END GR STYLE --}}

{{-- BEGIN DATATABLES STYLE --}}
<style>
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
        background-color: #bae7ff; // Choose your own color here
    }

    /* responsive header data table */
    .dataTable,
    .dataTables_scrollHeadInner,
    .dataTables_scrollBody {
        width: 100% !important;
    }

</style>
{{-- END DATATABLES STYLE --}}

{{-- placeholder --}}
<style>
    .input1 {
        font-weight: bold;
    }

    .input1::placeholder {
        font-weight: 400;
    }

</style>

{{-- table --}}
{{-- <style>
    table {
        margin: 0 auto;
        width: 1000%;
        clear: both;
        border-collapse: collapse;
        width: 200%;
        table-layout: fixed;
        word-wrap: break-word;
    }

</style> --}}
