{{-- input master vendor --}}
<script>
    $('input#remarks,#vendor_name_master_vendor,#service_master_vendor').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

</script>
{{-- end input master kanwil --}}

{{-- input master kanwil --}}
<script>
    $('input#kanwil_master_kanwil').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var branchcode_kanwil_master_kanwil = document.getElementById("branchcode_kanwil_master_kanwil");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    branchcode_kanwil_master_kanwil.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input master kanwil --}}

{{-- input kc supervisi --}}
<script>
    $('input#kc_supervisi_master_kc_supervisi').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var branchcode_kc_supervisi_master_kc_supervisi = document.getElementById("branchcode_kc_supervisi_master_kc_supervisi");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    branchcode_kc_supervisi_master_kc_supervisi.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input kc supervisi --}}

{{-- input uker --}}
<script>
    $('input#uker_master_uker,#jenis_uker_master_uker').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var branchcode_uker_master_uker = document.getElementById("branchcode_uker_master_uker");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    branchcode_uker_master_uker.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input uker --}}

{{-- input machine info --}}
<script>
    $('input#brand_machine_info,#type_machine_info').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var sn_machine_machine_info = document.getElementById("sn_machine_machine_info");
    var project_name_machine_info = document.getElementById("project_name_machine_info");
    var year_machine_info = document.getElementById("year_machine_info");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    sn_machine_machine_info.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });
    project_name_machine_info.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });
    year_machine_info.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input machine info --}}

{{-- input tid allocation --}}
<script>
    var tid_tid_allocation = document.getElementById("tid_tid_allocation");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    tid_tid_allocation.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input tid allocation --}}

{{-- input digital signage --}}
<script>
    $('input#brand_digital_signage,#sn_digital_signage_digital_signage,#project_name_digital_signage').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var year_digital_signage = document.getElementById("year_digital_signage");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    year_digital_signage.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input digital signage --}}

{{-- input cctv --}}
<script>
    $('input#brand_cctv,#sn_cctv_cctv,#project_name_cctv').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var year_cctv = document.getElementById("year_cctv");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    year_cctv.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input cctv --}}

{{-- input ups --}}
<script>
    $('input#brand_ups,#sn_ups_ups,#project_name_ups').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var year_ups = document.getElementById("year_ups");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    year_ups.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input ups --}}

{{-- input nvr --}}
<script>
    $('input#brand_nvr,#sn_nvr_nvr,#project_name_nvr').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var year_nvr = document.getElementById("year_nvr");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    year_nvr.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input nvr --}}

{{-- input cro allocation --}}
<script>
    $('input#project_name_cro_allocation').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var year_cro_allocation = document.getElementById("year_cro_allocation");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    year_cro_allocation.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input cro allocation --}}

{{-- input master unit kerja --}}
<script>
    $('input#location_category_group_master_unit_kerja,#detail_lokasi_master_unit_kerja').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var location_id_master_unit_kerja = document.getElementById("location_id_master_unit_kerja");
    var longitude_master_unit_kerja = document.getElementById("longitude_master_unit_kerja");
    var latitude_master_unit_kerja = document.getElementById("latitude_master_unit_kerja");
    var detail_lokasi_longitude_master_unit_kerja = document.getElementById("detail_lokasi_longitude_master_unit_kerja");
    var detail_lokasi_latitude_master_unit_kerja = document.getElementById("detail_lokasi_latitude_master_unit_kerja");

    var invalidChars_location_id_master_unit_kerja = [
        "-",
        "+",
        "e",
        ",",
    ];
    var invalidChars_longitude_master_unit_kerja = [
        "+",
        "e",
        ",",
    ];
    var invalidChars_latitude_master_unit_kerja = [
        "+",
        "e",
        ",",
    ];
    var invalidChars_detail_lokasi_longitude_master_unit_kerja = [
        "+",
        "e",
        ",",
    ];
    var invalidChars_detail_lokasi_latitude_master_unit_kerja = [
        "+",
        "e",
        ",",
    ];

    location_id_master_unit_kerja.addEventListener("keydown", function (e) {
        if (invalidChars_location_id_master_unit_kerja.includes(e.key)) {
            e.preventDefault();
        }
    });
    longitude_master_unit_kerja.addEventListener("keydown", function (e) {
        if (invalidChars_longitude_master_unit_kerja.includes(e.key)) {
            e.preventDefault();
        }
    });
    latitude_master_unit_kerja.addEventListener("keydown", function (e) {
        if (invalidChars_latitude_master_unit_kerja.includes(e.key)) {
            e.preventDefault();
        }
    });
    detail_lokasi_longitude_master_unit_kerja.addEventListener("keydown", function (e) {
        if (invalidChars_detail_lokasi_longitude_master_unit_kerja.includes(e.key)) {
            e.preventDefault();
        }
    });
    detail_lokasi_latitude_master_unit_kerja.addEventListener("keydown", function (e) {
        if (invalidChars_detail_lokasi_latitude_master_unit_kerja.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input master unit kerja --}}

{{-- input detail parameter tid --}}
<script>
    $('input#ip_address_detail_parameter_tid,#ip_address_host_detail_parameter_tid').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var port_host_detail_parameter_tid = document.getElementById("port_host_detail_parameter_tid");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    port_host_detail_parameter_tid.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input detail parameter tid --}}

{{-- input master lokasi --}}
<script>
    $('input#provinsi_master_lokasi,#kota_master_lokasi,#kecamatan_master_lokasi').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var kode_pos_master_lokasi = document.getElementById("kode_pos_master_lokasi");
    var invalidChars = [
        "-",
        "+",
        "e",
        ",",
    ];
    kode_pos_master_lokasi.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input master lokasi --}}

{{-- input master service point --}}
<script>
    $('input#nama_service_point_master_service_point').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var sp_longitude_master_service_point = document.getElementById("sp_longitude_master_service_point");
    var sp_latitude_master_service_point = document.getElementById("sp_latitude_master_service_point");
    var invalidChars = [
        "+",
        "e",
        ",",
    ];
    sp_longitude_master_service_point.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });
    sp_latitude_master_service_point.addEventListener("keydown", function (e) {
        if (invalidChars.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input master service point --}}

{{-- input master jarak tempuh --}}
<script>
    var jarak_tempuh_id_master_jarak_tempuh = document.getElementById("jarak_tempuh_id_master_jarak_tempuh");
    var jarak_master_jarak_tempuh = document.getElementById("jarak_master_jarak_tempuh");
    var kelas_master_jarak_tempuh = document.getElementById("kelas_master_jarak_tempuh");

    var invalidChars_jarak_tempuh_id_master_jarak_tempuh = [
        "-",
        "+",
        "e",
        ",",
    ];
    var invalidChars_jarak_master_jarak_tempuh = [
        "+",
        "e",
        ",",
    ];
    var invalidChars_kelas_master_jarak_tempuh = [
        "+",
        "e",
        ",",
    ];

    jarak_tempuh_id_master_jarak_tempuh.addEventListener("keydown", function (e) {
        if (invalidChars_jarak_tempuh_id_master_jarak_tempuh.includes(e.key)) {
            e.preventDefault();
        }
    });
    jarak_master_jarak_tempuh.addEventListener("keydown", function (e) {
        if (invalidChars_jarak_master_jarak_tempuh.includes(e.key)) {
            e.preventDefault();
        }
    });
    kelas_master_jarak_tempuh.addEventListener("keydown", function (e) {
        if (invalidChars_kelas_master_jarak_tempuh.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input master jarak tempuh --}}

{{-- input master sla problem --}}
<script>
    $('input#project_name_sla_problem,#rtl_group_sla_problem,#rtl_problem_sla_problem').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

    var sla_sla_problem = document.getElementById("sla_sla_problem");
    var denda_sla_problem = document.getElementById("denda_sla_problem");

    var invalidChars_sla_sla_problem = [
        "-",
        "+",
        "e",
        ",",
    ];
    var invalidChars_denda_sla_problem = [
        "-",
        "+",
        "e",
        ",",
    ];

    sla_sla_problem.addEventListener("keydown", function (e) {
        if (invalidChars_sla_sla_problem.includes(e.key)) {
            e.preventDefault();
        }
    });
    denda_sla_problem.addEventListener("keydown", function (e) {
        if (invalidChars_denda_sla_problem.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input master sla problem --}}

{{-- input mapping ticket to rtl --}}
<script>
    $('input#sla_category_mapping_ticket_to_rtl').bind('input', function () {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if (r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
    });

</script>
{{-- end input mapping ticket to rtl --}}

{{-- input sla tid --}}
<script>
    var sla_group_id_sla_id = document.getElementById("sla_group_id_sla_id");

    var invalidChars_sla_group_id_sla_id = [
        "+",
        "e",
        ",",
    ];

    sla_group_id_sla_id.addEventListener("keydown", function (e) {
        if (invalidChars_sla_group_id_sla_id.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input sla tid --}}

{{-- input target performance --}}
<script>
    var value_target_performance = document.getElementById("value_target_performance");

    var invalidChars_value_target_performance = [
        "-",
        "+",
        "e",
        ",",
    ];

    value_target_performance.addEventListener("keydown", function (e) {
        if (invalidChars_value_target_performance.includes(e.key)) {
            e.preventDefault();
        }
    });

</script>
{{-- end input target performance --}}
