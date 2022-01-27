 @extends('layouts.admin')
@section('heading', 'Data Jadwal')
@section('page')
    <li class="breadcrumb-item active">Data Jadwal</li>
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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal" data-target=".tambah-jadwal">
                                <i class="flaticon-plus"></i>
                            </button>
                            <a href="{{ route('jadwal.export_excel') }}" class="btn btn-icon btn-outline-success btn-sm" target="_blank">
                                <i class="flaticon-download"></i>
                            </a>
                            <button type="button" class="btn btn-icon btn-outline-warning btn-sm" data-toggle="modal" data-target="#importExcel">
                                <i class="flaticon-upload-1"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                                <i class="flaticon-delete"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                        <thead class="text-uppercase">
                            <tr>
                                <th>No.</th>
                                <th>Nama Kelas</th>
                                <th>Lihat Jadwal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kelas }}</td>
                                <td>
                                    <a href="{{ route('jadwal.show', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm">
                                        <i class="flaticon-eye"></i>
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

    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('jadwal.import_excel') }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h5 class="modal-title">Petunjuk :</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>rows 1 = nama hari</li>
                                    <li>rows 2 = nama kelas</li>
                                    <li>rows 3 = nama mapel</li>
                                    <li>rows 4 = nama guru</li>
                                    <li>rows 5 = jam mulai</li>
                                    <li>rows 6 = jam selesai</li>
                                </ul>
                            </div>
                        </div>
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('jadwal.deleteAll') }}">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sure you drop all data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                        <button type="submit" class="btn btn-danger">Drop</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg tambah-jadwal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('jadwal.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hari_id">Hari</label>
                                    <select id="hari_id" name="hari_id"
                                        class="form-control @error('hari_id') is-invalid @enderror  ">
                                        <option value="">-- Pilih Hari --</option>
                                        @foreach ($hari as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_hari }}</option>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jam_mulai">Jam Mulai</label>
                                    <input type='text' id="jam_mulai" name='jam_mulai'
                                        class="form-control @error('jam_mulai') is-invalid @enderror jam_mulai"
                                        placeholder="{{ Date('H:i') }}">
                                </div>
                                <div class="form-group">
                                    <label for="jam_selesai">Jam Selesai</label>
                                    <input type='text' id="jam_selesai" name='jam_selesai'
                                        class="form-control @error('jam_selesai') is-invalid @enderror"
                                        placeholder="{{ Date('H:i') }}">
                                </div>
                            </div>
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
        $("#DataJadwal").addClass("menu-item-open");
        $("#jam_mulai,#jam_selesai").timepicker({
            timeFormat: 'HH:mm'
        });
    </script>
@endsection
