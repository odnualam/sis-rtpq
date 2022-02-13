@extends('layouts.admin')
@section('heading', 'Edit Profile')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title text-capitalize">Edit Profile {{ Auth::user()->name }}</h3>
            </div>
            <form action="{{ route('pengaturan.ubah-profile') }}" method="post">
                @csrf
                <div class="card-body">
                @if (Auth::user()->role == "Guru")
                    <div class="row">
                    <input type="hidden" name="role" value="{{ Auth::user()->guru(Auth::user()->id_card)->role }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Guru</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->guru(Auth::user()->id_card)->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="id_card">Nomor ID Card</label>
                            <input type="text" id="id_card" name="id_card" class="form-control" value="{{ Auth::user()->guru(Auth::user()->id_card)->id_card }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telpon/HP</label>
                            <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" value="{{ Auth::user()->guru(Auth::user()->id_card)->telp }}" class="form-control @error('telp') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="  form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L"
                                    @if (Auth::user()->guru(Auth::user()->id_card)->jk == 'L')
                                        selected
                                    @endif
                                >Laki-Laki</option>
                                <option value="P"
                                    @if (Auth::user()->guru(Auth::user()->id_card)->jk == 'P')
                                        selected
                                    @endif
                                >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->guru(Auth::user()->id_card)->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    </div>
                @elseif (Auth::user()->role == "Santri")
                    <div class="row" name="role" value="{{ Auth::user()->santri(Auth::user()->nisn)->role }}">
                    <input type="hidden">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" id="nisn" name="nisn" value="{{ Auth::user()->santri(Auth::user()->nisn)->nisn }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Santri</label>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" disabled>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select id="jk" name="jk" class="  form-control @error('jk') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L"
                                    @if (Auth::user()->santri(Auth::user()->nisn)->jk == 'L')
                                        selected
                                    @endif
                                >Laki-Laki</option>
                                <option value="P"
                                    @if (Auth::user()->santri(Auth::user()->nisn)->jk == 'P')
                                        selected
                                    @endif
                                >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ Auth::user()->santri(Auth::user()->nisn)->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" name="kelas_id" class="  form-control @error('kelas_id') is-invalid @enderror" disabled>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}"
                                        @if (Auth::user()->santri(Auth::user()->nisn)->kelas_id == $data->id)
                                            selected
                                        @endif
                                    >{{ $data->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ Auth::user()->santri(Auth::user()->nisn)->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                        </div>
                    </div>
                    </div>
                @else
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="name">Username</label>
                        <input id="name" type="text" value="{{ Auth::user()->name }}" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off">
                        </div>
                    </div>
                    </div>
                @endif
                </div>

                <div class="card-footer">
                <a href="#" name="kembali" class="btn btn-default" id="back"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</a> &nbsp;
                <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan</button>
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
            window.location="{{ route('profile') }}";
        });
    });
</script>
@endsection
