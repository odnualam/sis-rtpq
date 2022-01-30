 @extends('layouts.admin')
@section('heading', 'Data Mengajar')
@section('page')
    <li class="breadcrumb-item active">Data Mengajar</li>
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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal" data-target=".tambah-mengajar">
                                <i class="flaticon-plus"></i>
                            </button>
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
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mengajar as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->guru->nama_guru }}</td>
                                <td>{{ $data->mapel->nama_mapel }}</td>
                                <td>{{ $data->kelas->nama_kelas }}</td>
                                <td>
                                    <a href="{{ route('mengajar.edit', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm">
                                        <i class="flaticon-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg tambah-mengajar" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Mengajar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mengajar.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="mapel_id">Mata Pelajaran</label>
                            <select id="mapel_id" name="mapel_id"
                                class="form-control @error('mapel_id') is-invalid @enderror  ">
                                <option value="">-- Pilih Mapel --</option>
                                @foreach ($mapel as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" name="kelas_id"
                                class="form-control @error('kelas_id') is-invalid @enderror  ">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="guru_id">Pengajar</label>
                            <select id="guru_id" name="guru_id"
                                class="form-control @error('guru_id') is-invalid @enderror  ">
                                <option value="">-- Pilih Guru --</option>
                                @foreach ($guru as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
                    </form>
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
