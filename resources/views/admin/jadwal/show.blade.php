 @extends('layouts.admin')
@section('heading')
  Data Jadwal {{ $kelas->nama_kelas }}
@endsection
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
    <li class="breadcrumb-item active">{{ $kelas->nama_kelas }}</li>
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
                            <a href="{{ route('jadwal.index') }}" class="btn btn-default btn-sm">
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
                            <th>Hari</th>
                            <th>Jadwal</th>
                            <th>Jam Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->hari->nama_hari }}</td>
                            <td>
                                <h5 class="card-title">{{ $data->mapel->nama_mapel }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $data->guru->nama_guru }}</small></p>
                            </td>
                            <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                            <td>
                            <form action="{{ route('jadwal.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('jadwal.edit',Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon-edit"></i></a>
                                <button class="btn btn-icon btn-outline-danger btn-sm"><i class="flaticon2-trash"></i></button>
                            </form>
                            </td>
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
        $("#MasterData").addClass("menu-item-open");
        $("#liMasterData").addClass("menu-item-open");
        $("#DataJadwal").addClass("menu-item-open");
    </script>
@endsection
