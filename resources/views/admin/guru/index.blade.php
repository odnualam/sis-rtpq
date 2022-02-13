 @extends('layouts.admin')
@section('heading', 'Data Guru')
@section('page')
    <li class="breadcrumb-item active">Data Guru</li>
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
                            {{-- <a href="{{ route('guru.export_excel') }}" class="btn btn-icon btn-outline-success btn-sm" target="_blank">
                                <i class="flaticon-download"></i>
                            </a>
                            <button type="button" class="btn btn-icon btn-outline-warning btn-sm" data-toggle="modal" data-target="#importExcel">
                                <i class="flaticon-upload-1"></i>
                            </button> --}}
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
                                <th>Foto</th>
                                <th>NUPTK/NIK</th>
                                <th>Id Card</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guru as $data)
                            <tr>
                                <td>
                                    <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_guru }}" data-gallery="gallery" data-footer='<a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                        <img src="{{ asset($data->foto) }}" width="50px" class="img-fluid mb-2">
                                    </a>
                                </td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->id_card }}</td>
                                <td>{{ $data->nama_guru }}</td>
                                <td>{{ $data->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>
                                    <form class="delete_form" action="{{ route('guru.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('guru.show', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="flaticon-eye"></i></a>
                                        <a href="{{ route('guru.edit', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon-edit"></i></a>
                                        <button class="btn btn-icon btn-outline-danger btn-sm"><i class="flaticon-delete"></i></button>
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NUPTK/NIK</label>
                                    <input type="text" id="nik" name="nik" onkeypress="return inputAngka(event)" class="form-control @error('nik') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="nama_guru">Nama Guru</label>
                                    <input type="text" id="nama_guru" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="jk" name="jk"class="  form-control @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                @php
                                $kode = $max+1;
                                if (strlen($kode) == 1) {
                                $id_card = "0000".$kode;
                                } else if(strlen($kode) == 2) {
                                $id_card = "000".$kode;
                                } else if(strlen($kode) == 3) {
                                $id_card = "00".$kode;
                                } else if(strlen($kode) == 4) {
                                $id_card = "0".$kode;
                                } else {
                                $id_card = $kode;
                                }
                                @endphp
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <select id="pendidikan" name="pendidikan"class="  form-control @error('pendidikan') is-invalid @enderror">
                                        <option value="">-- Pilih Pendidikan Terakhir --</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="Tidak Tamat SD/Sederajat">Tidak Tamat SD/Sederajat</option>
                                        <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I/II">Diploma I/II</option>
                                        <option value="Akademi/Diploma III/Sarjana Muda">Akademi/Diploma III/Sarjana Muda</option>
                                        <option value="Diploma IV/Stara I">Diploma IV/Stara I</option>
                                        <option value="Stara II">Stara II</option>
                                        <option value="Stara III">Stara III</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="id_card">Nomor ID Card</label>
                                    <input type="text" id="id_card" name="id_card" maxlength="5"
                                        onkeypress="return inputAngka(event)" value="{{ $id_card }}" class="form-control @error('id_card') is-invalid @enderror" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="foto">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
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

    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('guru.import_excel') }}" enctype="multipart/form-data">
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
                                    <li>rows 1 = nama guru</li>
                                    <li>rows 3 = jenis kelamin</li>
                                    <li>rows 4 = mata pelajaran</li>
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
            <form method="post" action="{{ route('guru.deleteAll') }}">
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
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $("#MasterData").addClass("menu-item-open");
        $("#liMasterData").addClass("menu-item-open");
        $("#DataGuru").addClass("menu-item-open");
    </script>
@endsection
