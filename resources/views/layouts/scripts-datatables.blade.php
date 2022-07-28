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

{{-- ===============================================================SCRIPT CCTV=============================================================== --}}
<script>
    $(function () {
        $('#cctv-table').DataTable({
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
                "url": "{{ route('cctv.getData') }}",
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
                    data: 'sn_cctv',
                    name: 'sn_cctv'
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
                    return `<a class="btn bg-transparent" href="{{ url('/cctv/edit/${row.cctv_id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/cctv/delete/${row.cctv_id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.sn_cctv} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT CCTV=============================================================== --}}

{{-- ===============================================================SCRIPT UPS=============================================================== --}}
<script>
    $(function () {
        $('#ups-table').DataTable({
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
                "url": "{{ route('ups.getData') }}",
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
                    data: 'sn_ups',
                    name: 'sn_ups'
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
                    return `<a class="btn bg-transparent" href="{{ url('/ups/edit/${row.ups_id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/ups/delete/${row.ups_id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.sn_ups} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT UPS=============================================================== --}}

{{-- ===============================================================SCRIPT NVR=============================================================== --}}
<script>
    $(function () {
        $('#nvr-table').DataTable({
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
                "url": "{{ route('nvr.getData') }}",
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
                    data: 'sn_nvr',
                    name: 'sn_nvr'
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
                    return `<a class="btn bg-transparent" href="{{ url('/nvr/edit/${row.nvr_id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/nvr/delete/${row.nvr_id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.sn_nvr} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT NVR=============================================================== --}}

{{-- ===============================================================SCRIPT MASTER LOKASI CRM=============================================================== --}}
<script>
    $(function () {
        $('#masterLokasiCrm-table').DataTable({
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
                "url": "{{ route('masterLokasiCrm.getData') }}",
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
                }, //0
                {
                    data: 'location_id',
                    name: 'location_id'
                }, //1
                {
                    data: 'kanwil',
                    name: 'kanwil'
                }, //2
                {
                    data: 'kc_supervisi',
                    name: 'kc_supervisi'
                }, //3
                {
                    data: 'uker',
                    name: 'uker'
                }, //4
                {
                    data: 'alamat',
                    name: 'alamat'
                }, //5
                {
                    data: 'longitude',
                    name: 'longitude'
                }, //6
                {
                    data: 'latitude',
                    name: 'latitude'
                }, //7
                {
                    data: 'location_category',
                    name: 'location_category'
                }, //8
                {
                    data: 'kode_pos',
                    name: 'kode_pos'
                }, //9
                {
                    data: 'status_kepemilikan',
                    name: 'status_kepemilikan'
                }, //10
                {
                    data: 'location_category_group',
                    name: 'location_category_group'
                }, //11
                {
                    data: 'detail_lokasi',
                    name: 'detail_lokasi'
                }, //12
                {
                    data: 'detail_location_group',
                    name: 'detail_location_group'
                }, //13
                {
                    data: 'jenis_detail_lokasi',
                    name: 'jenis_detail_lokasi'
                }, //14
                {
                    data: 'detail_lokasi_longitude',
                    name: 'detail_lokasi_longitude'
                }, //15
                {
                    data: 'detail_lokasi_latitude',
                    name: 'detail_lokasi_latitude'
                }, //16
                {
                    data: 'jam_operasional',
                    name: 'jam_operasional'
                }, //17
                {
                    data: 'namepic_nohp',
                    name: 'namepic_nohp'
                }, //18
            ],
            columnDefs: [{
                "targets": 19,
                "render": function (data, type, row, meta) {
                    return `<a class="btn bg-transparent" href="{{ url('/masterLokasiCrm/edit/${row.master_lokasi_crm_id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i>Edit</a> |
            <a class="btn bg-transparent" href="{{ url('/masterLokasiCrm/delete/${row.master_lokasi_crm_id}') }}" onclick="return confirm('Yakin ingin menghapus data: ${row.location_id} ??')"><i class="fa-solid fa-trash text-danger"></i>Hapus</a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MASTER LOKASI CRM=============================================================== --}}
