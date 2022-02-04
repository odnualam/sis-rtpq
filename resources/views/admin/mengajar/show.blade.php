@extends('layouts.admin')
@section('heading')
    Data Mengajar {{ $kelas->nama_kelas }}
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
                            <a href="{{ route('mengajar.index') }}" class="btn btn-default btn-sm">
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
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mengajar as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->guru->nama_guru }}</td>
                                <td>{{ $data->mapel->nama_mapel }}</td>
                                <td>
                                    <form class="delete_form" action="{{ route('mengajar.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('mengajar.edit', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm">
                                            <i class="flaticon-edit"></i>
                                        </a>
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
        $("#DataMengajar").addClass("menu-item-open");
    </script>
@endsection
