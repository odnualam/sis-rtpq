 @extends('layouts.admin')
@section('heading', 'Data Kelompok Mapel')
@section('page')
    <li class="breadcrumb-item active">Data Kelompok Mapel</li>
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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal" data-target=".tambah-kelompok">
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
                            <th>Jenis</th>
                            <th>Nama Kelompok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelompok as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->jenis }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <form class="delete_form" action="{{ route('kelompok.destroy', $data->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('kelompok.edit', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon-edit"></i></a>
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

    <div class="modal fade bd-example-modal-md tambah-kelompok" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Kelompok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelompok.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" id="jenis" name="jenis"
                                        class="form-control @error('jenis') is-invalid @enderror"
                                        placeholder="{{ __('Jenis') }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kelompok</label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="{{ __('Nama Kelompok Mapel') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span><i
                                class="flaticon2-left-arrow-1"></i></span>Kembali</button>
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
    $("#DataKelompok").addClass("menu-item-open");
  </script>
@endsection
