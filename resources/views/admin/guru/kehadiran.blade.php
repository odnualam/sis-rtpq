 @extends('layouts.admin')
@section('heading', 'Absensi Guru')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('guru.absensi') }}">Absensi guru</a></li>
    <li class="breadcrumb-item active">{{ $guru->nama_guru }}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label">@yield('heading')</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline mr-2">
                            <a href="{{ route('guru.index') }}" class="btn btn-default btn-sm">
                                <span><i class="flaticon2-left-arrow-1"></i></span>Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                    <thead class="text-uppercase">
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absen as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('l, d F Y', strtotime($data->tanggal)) }}</td>
                            <td>{{ $data->kehadiran->ket }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#AbsensiGuru").addClass("menu-item-open");
    </script>
@endsection
