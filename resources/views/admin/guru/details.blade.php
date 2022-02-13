 @extends('layouts.admin')
@section('heading', 'Details Guru')
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
                            <a href="javascript: history.go(-1)" class="btn btn-default btn-sm">
                                <span><i class="flaticon2-left-arrow-1"></i></span>Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NUPTK/NIK</label>
                                <input type="text" id="nik" name="nik" value="{{ $guru->nik }}" disabled
                                    class="form-control @error('nik') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru</label>
                                <input type="text" id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}" disabled
                                    class="form-control @error('nama_guru') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $guru->tmp_lahir }}" disabled
                                    class="form-control @error('tmp_lahir') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $guru->tgl_lahir }}" disabled
                                    class="form-control @error('tgl_lahir') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk" class="  form-control @error('jk') is-invalid @enderror" disabled>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" @if ($guru->jk == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if ($guru->jk == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan Terakhir</label>
                                <select id="pendidikan" name="pendidikan"class="  form-control @error('pendidikan') is-invalid @enderror" disabled>
                                    <option value="">-- Pilih Pendidikan Terakhir --</option>
                                    <option value="Tidak/Belum Sekolah" @if ($guru->pendidikan == 'Tidak/Belum Sekolah') selected @endif>Tidak/Belum Sekolah</option>
                                    <option value="Tidak Tamat SD/Sederajat" @if ($guru->pendidikan == 'Tidak Tamat SD/Sederajat') selected @endif>Tidak Tamat SD/Sederajat</option>
                                    <option value="Tamat SD/Sederajat" @if ($guru->pendidikan == 'Tamat SD/Sederajat') selected @endif>Tamat SD/Sederajat</option>
                                    <option value="SLTP/Sederajat" @if ($guru->pendidikan == 'SLTP/Sederajat') selected @endif>SLTP/Sederajat</option>
                                    <option value="SLTA/Sederajat" @if ($guru->pendidikan == 'SLTA/Sederajat') selected @endif>SLTA/Sederajat</option>
                                    <option value="Diploma I/II" @if ($guru->pendidikan == 'Diploma I/II') selected @endif>Diploma I/II</option>
                                    <option value="Akademi/Diploma III/Sarjana Muda" @if ($guru->pendidikan == 'Akademi/Diploma III/Sarjana Muda') selected @endif>Akademi/Diploma III/Sarjana Muda</option>
                                    <option value="Diploma IV/Stara I" @if ($guru->pendidikan == 'Diploma IV/Stara I') selected @endif>Diploma IV/Stara I</option>
                                    <option value="Stara II" @if ($guru->pendidikan == 'Stara II') selected @endif>Stara II</option>
                                    <option value="Stara III" @if ($guru->pendidikan == 'Stara III') selected @endif>Stara III</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telpon/HP</label>
                                <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" disabled
                                    value="{{ $guru->telp }}" class="form-control @error('telp') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="id_card">Nomor ID Card</label>
                                <input type="text" id="id_card" name="id_card" class="form-control" disabled
                                    value="{{ $guru->id_card }}">
                            </div>
                        </div>
                    </div>
                </div>
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
