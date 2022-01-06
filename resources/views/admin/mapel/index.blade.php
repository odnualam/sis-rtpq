 @extends('layouts.admin')
@section('heading', 'Data Mapel')
@section('page')
    <li class="breadcrumb-item active">Data Mapel</li>
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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal" data-target=".tambah-mapel">
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
                            <th>Nama Mapel</th>
                            <th>Paket</th>
                            <th>Kelompok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $result => $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_mapel }}</td>
                            @if ( $data->paket_id == 9 )
                            <td>{{ 'Semua' }}</td>
                            @else
                            <td>{{ $data->paket->ket }}</td>
                            @endif
                            <td>{{ $data->kelompok }}</td>
                            <td>
                                <form action="{{ route('mapel.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('mapel.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                    <button class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
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

    <div class="modal fade bd-example-modal-md tambah-mapel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mapel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mapel.store') }}" method="post">
                @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" id="nama_mapel" name="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="{{ __('Nama Mata Pelajaran') }}">
                        </div>
                        <div class="form-group">
                        <label for="paket_id">Paket</label>
                        <select id="paket_id" name="paket_id" class="form-control @error('paket_id') is-invalid @enderror  ">
                            <option value="">-- Pilih Paket Mapel --</option>
                            <option value="9">Semua</option>
                            @foreach ($paket as $data)
                            <option value="{{ $data->id }}">{{ $data->ket }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="kelompok">Kelompok</label>
                            <select id="kelompok" name="kelompok" class="  form-control @error('kelompok') is-invalid @enderror">
                            <option value="">-- Pilih Kelompok Mapel --</option>
                            <option value="A">Pelajaran Umum</option>
                            <option value="B">Pelajaran Khusus</option>
                            <option value="C">Pelajaran Keahlian</option>
                            </select>
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
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataMapel").addClass("active");
  </script>
@endsection