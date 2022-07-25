{{-- ===============================================================SCRIPT ADMIN USER=============================================================== --}}
<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('admin.users.getData') }}",
                "dataType": "json"
            }, // memanggil route yang menampilkan data json
            columns: [
                // penomoran datatables tanpa yajra
                {
                    data: null,
                    "sortable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                // mengambil & menampilkan kolom sesuai tabel database
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'unit_kerja',
                    name: 'unit_kerja'
                },
                {
                    data: 'project',
                    name: 'project'
                },
                {
                    data: 'jabatan',
                    name: 'jabatan'
                },
                {
                    data: 'no_telp',
                    name: 'no_telp'
                },
            ],
            // menambahkan kolom aksi tanpa yajra
            columnDefs: [{
                "targets": 8,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('admin/users/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit User & Rolenya</a> |
            <a class="btn bg-transparent" href="{{ url('admin/users/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data user: ${row.name} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }, ],

        });
    });

</script>
{{-- ===============================================================END SCRIPT ADMIN USER=============================================================== --}}

{{-- ===============================================================SCRIPT ADMIN ROLE=============================================================== --}}
<script>
    $(function () {
        $('#roles-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('admin.roles.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    data: null,
                    "sortable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
            ],
            columnDefs: [{
                "targets": 2,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('admin/roles/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit Role & Permissionnya</a> |
            <a class="btn bg-transparent" href="{{ url('admin/roles/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data role: ${row.name} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT ADMIN ROLE=============================================================== --}}

{{-- ===============================================================SCRIPT ADMIN PERMISSIONS=============================================================== --}}
<script>
    $(function () {
        $('#permissions-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('admin.permissions.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    data: null,
                    "sortable": false,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
            ],
            columnDefs: [{
                "targets": 2,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('admin/permissions/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit Permissions & Rolesnya</a> |
            <a class="btn bg-transparent" href="{{ url('admin/permissions/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data role: ${row.name} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT ADMIN PERMISSIONS=============================================================== --}}

{{-- ===============================================================SCRIPT MASTER VENDOR=============================================================== --}}
<script>
    $(function () {
        $('#masterVendor-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('masterVendor.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'vendor_id',
                    name: 'vendor_id'
                },
                {
                    data: 'vendor_name',
                    name: 'vendor_name'
                },
                {
                    data: 'service',
                    name: 'service'
                },
            ],
            columnDefs: [{
                "targets": 4,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/masterVendor/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/masterVendor/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.vendor_name} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MASTER VENDOR=============================================================== --}}

{{-- ===============================================================SCRIPT MASTER KANWIL=============================================================== --}}
<script>
    $(function () {
        $('#masterKanwil-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('masterKanwil.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'branchcode_kanwil',
                    name: 'branchcode_kanwil'
                },
                {
                    data: 'kanwil',
                    name: 'kanwil'
                },
            ],
            columnDefs: [{
                "targets": 3,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/masterKanwil/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/masterKanwil/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.kanwil} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MASTER KANWIL=============================================================== --}}

{{-- ===============================================================SCRIPT MASTER KC SUPERVISI=============================================================== --}}
<script>
    $(function () {
        $('#masterKcSupervisi-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('masterKcSupervisi.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'branchcode_kc_supervisi',
                    name: 'branchcode_kc_supervisi'
                },
                {
                    data: 'kc_supervisi',
                    name: 'kc_supervisi'
                },
            ],
            columnDefs: [{
                "targets": 3,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/masterKcSupervisi/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/masterKcSupervisi/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.kc_supervisi} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MASTER KC SUPERVISI=============================================================== --}}

{{-- ===============================================================SCRIPT MASTER UKER=============================================================== --}}
<script>
    $(function () {
        $('#masterUker-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('masterUker.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'branchcode_uker',
                    name: 'branchcode_uker'
                },
                {
                    data: 'uker',
                    name: 'uker'
                },
                {
                    data: 'jenis_uker',
                    name: 'jenis_uker'
                },
            ],
            columnDefs: [{
                "targets": 4,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/masterUker/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/masterUker/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.uker} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MASTER UKER=============================================================== --}}

{{-- ===============================================================SCRIPT MACHINE INFO=============================================================== --}}
<script>
    $(function () {
        $('#machineInfo-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('machineInfo.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'brand',
                    name: 'brand'
                },
                {
                    data: 'vendor_name',
                    name: 'vendor_name'
                },
                {
                    data: 'sn_machine',
                    name: 'sn_machine'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'no_spk',
                    name: 'no_spk'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'year',
                    name: 'year'
                },
            ],
            columnDefs: [{
                "targets": 8,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/machineInfo/edit/${row.machine_info_id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/machineInfo/delete/${row.machine_info_id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.sn_machine} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MACHINE INFO=============================================================== --}}

{{-- ===============================================================SCRIPT DIGITAL SIGNAGE=============================================================== --}}
<script>
    $(function () {
        $('#digitalSignage-table').DataTable({
            processing: true,
            serverSide: true,
            searchable: true,
            scrollY: 500,
            scrollX: true,
            // scrollCollapse: true,
            "order": [
                [1, "asc"]
            ],
            "pagingType": "full_numbers",
            paging: true,
            pageLength: 50,
            ajax: {
                "async": "true",
                "url": "{{ route('digitalSignage.getData') }}",
                "dataType": "json"
            },
            columns: [{
                    "data": null,
                    "class": "align-top",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'vendor_name',
                    name: 'vendor_name'
                },
                {
                    data: 'brand',
                    name: 'brand'
                },
                {
                    data: 'sn_digital_signage',
                    name: 'sn_digital_signage'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'no_spk',
                    name: 'no_spk'
                },
                {
                    data: 'project_name',
                    name: 'project_name'
                },
                {
                    data: 'year',
                    name: 'year'
                },
            ],
            columnDefs: [{
                "targets": 8,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/digitalSignage/edit/${row.digital_signage_id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/digitalSignage/delete/${row.digital_signage_id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.sn_digital_signage} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT DIGITAL SIGNAGE=============================================================== --}}
