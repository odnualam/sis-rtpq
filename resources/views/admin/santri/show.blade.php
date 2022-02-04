@extends('layouts.admin')
@section('heading')
    Data Santri {{ $kelas->nama_kelas }}
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
                            <a href="{{ route('santri.index') }}" class="btn btn-default btn-sm">
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
                            <th>Foto</th>
                            <th>NISN</th>
                            <th>Nama Santri</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($santri as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('santri.ubah-foto', Crypt::encrypt($data->id)) }}">
                                        <img src="{{ asset($data->foto) }}" style="height: 90px;width: 100px;object-fit: cover;object-position: center center;">
                                    </a>
                                </td>
                                <td>{{ $data->nisn }}</td>
                                <td>{{ $data->nama_santri }}</td>
                                <td>{{ $data->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('santri.destroy', $data->id) }}" method="post" class="delete_form">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('santri.show', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="flaticon-eye"></i></a>
                                            <a href="{{ route('santri.edit', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon-edit"></i></a>
                                            <button class="btn btn-icon btn-outline-danger btn-sm"><i class="flaticon-delete"></i></button>
                                        </form>
                                        <form action="{{ route('santri.naik-kelas', Crypt::encrypt($data->id)) }}" method="post">
                                            @csrf
                                            <button title="Naik Kelas" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon2-zig-zag-line-sign"></i></button>
                                        </form>
                                    </div>
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
        $("#Datasantri").addClass("menu-item-open");
    </script>
@endsection
