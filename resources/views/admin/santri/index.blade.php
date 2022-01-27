 @extends('layouts.admin')
@section('heading', 'Data Santri')
@section('page')
    <li class="breadcrumb-item active">Data Santri</li>
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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <i class="flaticon-plus"></i>
                            </button>
                            <a href="{{ route('santri.export_excel') }}" class="btn btn-icon btn-outline-success btn-sm" target="_blank">
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
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('santri.import_excel') }}" enctype="multipart/form-data">
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
                                                <li>rows 1 = nama santri</li>
                                                <li>rows 2 = no induk santri</li>
                                                <li>rows 3 = jenis kelamin</li>
                                                <li>rows 4 = nama kelas</li>
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
                        <form method="post" action="{{ route('santri.deleteAll') }}">
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
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                        <thead class="text-uppercase">
                            <tr>
                                <th>No.</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_kelas }}</td>
                                    <td>
                                        <a href="{{ route('santri.kelas', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Santri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('santri.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_induk">Nomor Induk</label>
                                    <input type="text" id="no_induk" name="no_induk" onkeypress="return inputAngka(event)"
                                        class="form-control @error('no_induk') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="nama_santri">Nama Santri</label>
                                    <input type="text" id="nama_santri" name="nama_santri"
                                        class="form-control @error('nama_santri') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="jk" name="jk"
                                        class="  form-control @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" id="tmp_lahir" name="tmp_lahir"
                                        class="form-control @error('tmp_lahir') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="foto">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto"
                                                class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nis">NISN</label>
                                    <input type="text" id="nis" name="nis" onkeypress="return inputAngka(event)"
                                        class="form-control @error('nis') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="kelas_id">Kelas</label>
                                    <select id="kelas_id" name="kelas_id"
                                        class="  form-control @error('kelas_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)"
                                        class="form-control @error('telp') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Tambahkan</button>
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
        $("#Datasantri").addClass("menu-item-open");
    </script>
@endsection
