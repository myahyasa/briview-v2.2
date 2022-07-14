{{-- ===============================================================SCRIPT MASTER VENDOR=============================================================== --}}
<script>
    $(function () {
        // MASTER VENDOR
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
                "url": "{{ route('users.getData') }}",
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role_id',
                    name: 'role_id'
                },
            ],
            // menambahkan kolom aksi tanpa yajra
            columnDefs: [{
                "targets": 4,
                "render": function (data, type, row, meta) {
                    return `<a href="{{ url('users/edit/${row.id}') }}"><i class="fa-solid fa-pen-to-square text-success"></i></a> |
            <a href="{{ url('users/delete/${row.id}') }}" onclick="return confirm('Yakin ingin menghapus data user: ${row.name} ??')"><i class="fa-solid fa-trash text-danger"></i></a>`;
                }
            }],

        });
    });

</script>
{{-- ===============================================================END SCRIPT MASTER VENDOR=============================================================== --}}
