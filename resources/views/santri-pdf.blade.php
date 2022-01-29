<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Santri Rumah Tahfidz Pejuang Quran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shrotcut icon" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <table class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important" width="100%">
                <thead class="text-uppercase">
                    <tr>
                        <th colspan="4" class="text-center">Daftar Murid Kelas {{ $kelas->nama_kelas }}</th>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <th>NISN</th>
                        <th>Nama Santri</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($santri as $data)
                        <tr>
                            <td><img src="{{ public_path($data->foto) }}" alt="" style="width: 100px; height: 100px;"></td>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->nama_santri }}</td>
                            <td>{{ $data->jk }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
