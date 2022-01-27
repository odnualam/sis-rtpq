 @extends('layouts.admin')
@section('heading', 'Ubah Foto')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
    <li class="breadcrumb-item active">Ubah Foto</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                    <h3 class="card-title">Form ubah foto</h3>
                    </div>
                    <div class="col-md-6">
                        <h3 class="card-title">Foto Saat ini</h3>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('guru.update-foto', $guru->id) }}"  enctype="multipart/form-data" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru</label>
                                <input type="text" name="nama_guru" class="form-control" value="{{ $guru->nama_guru }}" readonly>
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
                        <div class="col-md-6">
                            <img src="{{ asset($guru->foto) }}" class="img img-responsive" alt="" width="30%" />
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route("guru.index") }}" class="btn btn-default"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</a> &nbsp;
                    <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-upload"></i> &nbsp; Upload</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("menu-item-open");
        $("#liMasterData").addClass("menu-item-open");
        $("#DataGuru").addClass("menu-item-open");
    </script>
@endsection
