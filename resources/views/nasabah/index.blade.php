<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar Costumers</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<body class="font-sans antialiased">
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Nasabah</h3>
            @can('costumers_create')
                <a href="{{ route('nasabah.create') }}" class="btn btn-primary">Tambah Nasabah</a>
            @endcan
        </div>
        <div class="card-body">
            <table id="costumers-table" class="table align-middle table-rounded table-striped table-row-gray-300 fs-6 gy-5">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Provinsi</th>
                    <th>Kota/Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                    <th>Nominal Setor</th>
                    <th>Approved</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#costumers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('nasabah.index') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'nama', name: 'nama' },
                { data: 'tempat_lahir', name: 'tempat_lahir' },
                { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                { data: 'kode_pekerjaan', name: 'kode_pekerjaan' },
                { data: 'kode_provinsi', name: 'kode_provinsi' },
                { data: 'kode_kabupaten_kota', name: 'kode_kabupaten_kota' },
                { data: 'kode_kecamatan', name: 'kode_kecamatan' },
                { data: 'kode_kelurahan', name: 'kode_kelurahan' },
                { data: 'alamat', name: 'alamat' },
                { data: 'nominal_setor', name: 'nominal_setor' },
                { data: 'is_approved', name: 'is_approved', orderable: true, searchable: true, className: 'text-center' },
            ],
            order: [[1, 'asc']],
            scrollX: true,
            scrollY: '500px',
            fixedColumns: { left: 3, right: 1 },
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
            },
            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]]
        });
    });
</script>
</body>
</html>
