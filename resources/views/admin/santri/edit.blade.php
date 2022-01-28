 @extends('layouts.admin')
@section('heading', 'Edit Santri')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('santri.index') }}">Santri</a></li>
    <li class="breadcrumb-item active">Edit Santri</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">Edit Data Santri</h3>
            </div>
            <form action="{{ route('santri.update', $santri->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="{{ $santri->nisn }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_santri">Nama Santri</label>
                            <input type="text" id="nama_santri" name="nama_santri" value="{{ $santri->nama_santri }}" class="form-control @error('nama_santri') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="  form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L"
                                    @if ($santri->jk == 'L')
                                        selected
                                    @endif
                                >Laki-Laki</option>
                                <option value="P"
                                    @if ($santri->jk == 'P')
                                        selected
                                    @endif
                                >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $santri->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" name="kelas_id" class="  form-control @error('kelas_id') is-invalid @enderror">
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}"
                                        @if ($santri->kelas_id == $data->id)
                                            selected
                                        @endif
                                    >{{ $data->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telpon/HP</label>
                            <input type="text" id="telp" name="telp" value="{{ $santri->telp }}" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $santri->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                </div>
                </div>

                <div class="card-footer">
                <a href="#" name="kembali" class="btn btn-default" id="back"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</a> &nbsp;
                <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('santri.kelas', Crypt::encrypt($santri->kelas_id)) }}";
        });
    });
    $("#MasterData").addClass("menu-item-open");
    $("#liMasterData").addClass("menu-item-open");
    $("#Datasantri").addClass("menu-item-open");
</script>
@endsection
