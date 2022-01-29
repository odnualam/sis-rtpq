@extends('layouts.admin')
@section('heading', 'Details Santri')
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
                            <a href="{{ route('santri.kelas', Crypt::encrypt($santri->kelas_id)) }}" class="btn btn-default btn-sm">
                                <span><i class="flaticon2-left-arrow-1"></i></span>Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <a href="{{ asset($santri->foto) }}" target="_blank">
                                    <img src="{{ asset($santri->foto) }}" class="card-img img-details" style="height: 90px;width: 100px;object-fit: cover;object-position: center center;">
                                </a>
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" value="{{ $santri->nisn }}" id="nisn" name="nisn" onkeypress="return inputAngka(event)" class="form-control @error('nisn') is-invalid @enderror" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="nama_santri">Nama Santri</label>
                                <input type="text" value="{{ $santri->nama_santri }}" id="nama_santri" name="nama_santri"
                                    class="form-control @error('nama_santri') is-invalid @enderror" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select id="kelas_id" name="kelas_id" class="  form-control @error('kelas_id') is-invalid @enderror" disabled="disabled">
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
                                <label for="jk">Jenis Kelamin</label>
                                <select id="jk" name="jk"
                                    class="  form-control @error('jk') is-invalid @enderror" disabled="disabled">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ 'L' == $santri->jk ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ 'P' == $santri->jk ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" value="{{ $santri->tmp_lahir }}" id="tmp_lahir" name="tmp_lahir"
                                    class="form-control @error('tmp_lahir') is-invalid @enderror" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $santri->tgl_lahir }}"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select id="agama" name="agama"
                                    class="form-control @error('agama') is-invalid @enderror" disabled="disabled">
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" {{ 'Islam' == $santri->agama ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen Protestan" {{ 'Kristen Protestan' == $santri->agama ? 'selected' : '' }}>Kristen Protestan</option>
                                    <option value="Katolik" {{ 'Katolik' == $santri->agama ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ 'Hindu' == $santri->agama ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ 'Buddha' == $santri->agama ? 'selected' : '' }}>Buddha</option>
                                    <option value="Khonghucu" {{ 'Khonghucu' == $santri->agama ? 'selected' : '' }}>Khonghucu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat_santri">Alamat Santri</label>
                                <textarea class="form-control @error('alamat_santri') is-invalid @enderror" disabled="disabled" name="alamat_santri" id="alamat_santri" cols="30" rows="5">{{ $santri->alamat_santri }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                @php
                                    foreach (range(2017,date('Y')) as $i ) {
                                        $j=$i+1;
                                        $tahun_ajaran[$i.'-'.$j] = $i.'/'.$j;
                                    }
                                @endphp
                                <select id="tahun_ajaran" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" disabled="disabled">
                                    <option value="">-- Pilih Tahun Ajaran --</option>
                                    @foreach ($tahun_ajaran as $item)
                                        <option value="{{ $item }}" {{ $item == $santri->tahun_ajaran ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="anak_ke">Anak Ke</label>
                                <input type="text" value="{{ $santri->anak_ke }}" id="anak_ke" name="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" disabled="disabled" placeholder="2 dari 3 bersaudara">
                            </div>
                            <div class="form-group">
                                <label for="status_keluarga">Status Dalam Keluarga</label>
                                <input type="text" value="{{ $santri->status_keluarga }}" id="status_keluarga" name="status_keluarga" class="form-control @error('status_keluarga') is-invalid @enderror" disabled="disabled">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h3 class="font-size-lg text-dark font-weight-bold mb-6">Nama Orang Tua:</h3>
                            <div class="mb-15">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="nama_ayah">Ayah</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $santri->nama_ayah }}" id="nama_ayah" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="nama_ibu">Ibu</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $santri->nama_ibu }}" id="nama_ibu" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <h3 class="font-size-lg text-dark font-weight-bold mb-6">Pekerjaan Orang Tua:</h3>
                            <div class="mb-15">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="pekerjaan_ayah">Ayah</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $santri->pekerjaan_ayah }}" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="pekerjaan_ibu">Ibu</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $santri->pekerjaan_ibu }}" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <h3 class="font-size-lg text-dark font-weight-bold mb-6">Alamat Orang Tua:</h3>
                            <div class="mb-15">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="alamat_ayah">Ayah</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('alamat_ayah') is-invalid @enderror" disabled="disabled" name="alamat_ayah" id="alamat_ayah" cols="30" rows="5">{{ $santri->alamat_ayah }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="alamat_ibu">Ibu</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('alamat_ibu') is-invalid @enderror" disabled="disabled" name="alamat_ibu" id="alamat_ibu" cols="30" rows="5">{{ $santri->alamat_ibu }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <h3 class="font-size-lg text-dark font-weight-bold mb-6">Wali Santri:</h3>
                            <div class="mb-15">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="nama_wali">Nama</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $santri->nama_wali }}" id="nama_wali" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="alamat_wali">Alamat</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('alamat_wali') is-invalid @enderror" disabled="disabled" name="alamat_wali" id="alamat_wali" cols="30" rows="5">{{ $santri->alamat_wali }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label text-right" for="pekerjaan_wali">Pekerjaan</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="{{ $santri->pekerjaan_wali }}" id="pekerjaan_wali" name="pekerjaan_wali" class="form-control @error('pekerjaan_wali') is-invalid @enderror" disabled="disabled">
                                    </div>
                                </div>
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
        $("#Datasantri").addClass("menu-item-open");
    </script>
@endsection
