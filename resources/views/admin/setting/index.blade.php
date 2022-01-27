@extends('layouts.admin')
@section('heading', 'Setting')
@section('content')
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                            <span class="nav-icon">
                                <i class="menu-icon flaticon-home"></i>
                            </span>
                            <span class="nav-text font-size-lg">Identitas Sekolah</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
                            <span class="nav-icon">
                                <i class="menu-icon flaticon-layers"></i>
                            </span>
                            <span class="nav-text font-size-lg">Sarana Prasarana</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                            <span class="nav-icon">
                                <i class="menu-icon flaticon2-calendar-3"></i>
                            </span>
                            <span class="nav-text font-size-lg">Kontak</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4">
                            <span class="nav-icon">
                                <i class="menu-icon flaticon-map-location"></i>
                            </span>
                            <span class="nav-text font-size-lg">Alamat</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-toolbar">
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary font-weight-bolder" form="myform">
                        <i class="ki ki-check icon-xs"></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="myform" class="form" action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="tab-content">
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7 my-2">
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Logo</label>
                                    <div class="col-8">
                                        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(/metronic/theme/html/demo1/dist/assets/media/users/blank.png)">
                                            <div class="image-input-wrapper"></div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">NPSN</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="npsn" value="{{ $setting->npsn }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Nama Sekolah</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="nama_sekolah" value="{{ $setting->nama_sekolah }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Nama Kepala Sekolah</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="nama_kepala_sekolah" value="{{ $setting->nama_kepala_sekolah }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Status Sekolah</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="status_sekolah" value="{{ $setting->status_sekolah }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Jenjang Pendidikan</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="jenjang_pendidikan" value="{{ $setting->jenjang_pendidikan }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Waktu Penyelenggaraan</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="text" name="waktu_penyelenggaraan" value="{{ $setting->waktu_penyelenggaraan }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Jumlah Santri</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="number" name="jumlah_santri" value="{{ $setting->jumlah_santri }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Jumlah Guru</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="number" name="jumlah_guru" value="{{ $setting->jumlah_guru }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-lg-right text-left">Jumlah Kelas</label>
                                    <div class="col-8">
                                        <input class="form-control form-control-lg form-control-solid" type="number" name="ruang_kelas" value="{{ $setting->ruang_kelas }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <div class="my-2">
                                    <div class="row">
                                        <label class="col-form-label col-3 text-lg-right text-left"></label>
                                        <div class="col-9">
                                            <h6 class="text-dark font-weight-bold mb-10">Sarana Prasarana:</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Luas Tanah</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="luas_tanah" value="{{ $setting->luas_tanah }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Akses Internet</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="akses_internet" value="{{ $setting->akses_internet }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Sumber Listrik</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="sumber_listrik" value="{{ $setting->sumber_listrik }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <div class="my-2">
                                    <div class="row">
                                        <label class="col-form-label col-3 text-lg-right text-left"></label>
                                        <div class="col-9">
                                            <h6 class="text-dark font-weight-bold mb-10">Kontak:</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">No.Telepon</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="no_telpon" value="{{ $setting->no_telpon }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Email</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="email" value="{{ $setting->email }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Website</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="website" value="{{ $setting->website }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="kt_user_edit_tab_4" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-7">
                                <div class="my-2">
                                    <div class="row">
                                        <label class="col-form-label col-3 text-lg-right text-left"></label>
                                        <div class="col-9">
                                            <h6 class="text-dark font-weight-bold mb-10">Alamat:</h6>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Alamat</label>
                                        <div class="col-9">
                                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ $setting->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Provinsi</label>
                                        <div class="col-9">
                                            <select class="form-control select2" name="provinsi" id="inputProvince">
                                                <option label="Label"></option>
                                                @foreach( $provinces as $key => $province )
                                                    <option value="{{ $province->code }}" {{ $province->code == $setting->provinsi ? 'selected' : '' }}>{{ $province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Kabupaten/Kota</label>
                                        <div class="col-9">
                                            <select class="form-control select2" name="kabupaten_kota" id="inputRegency">
                                                <option value="{{ $city->code }}" {{ $city->code == $setting->kabupaten_kota ? 'selected' : '' }}>{{ $city->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Kecamatan</label>
                                        <div class="col-9">
                                            <select class="form-control select2" name="kecamatan" id="inputDistrict">
                                                <option value="{{ $district->code }}" {{ $district->code == $setting->kecamatan ? 'selected' : '' }}>{{ $district->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Kelurahan</label>
                                        <div class="col-9">
                                            <select class="form-control select2" name="kelurahan" id="inputVillage">
                                                <option value="{{ $village->code }}" {{ $village->code == $setting->kelurahan ? 'selected' : '' }}>{{ $village->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Kode Pos</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="kode_pos" value="{{ $setting->kode_pos }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('select').select2({
                placeholder: '--Pilih--',
                allowClear: true,
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            // get Kabupaten
            $("#inputProvince").change(function () {
                    $.get("{{ route('city.list.json', '') }}/" + this.value, function (data) {
                        $("#inputRegency option").remove().append("");
                        $.each(data, function (key, value) {
                            $("#inputRegency").append(new Option(value.name, value.code));
                        });
                    }, "json");
                }
            );
            // get Kecamatan
            $("#inputRegency").change(function () {
                    $.get("{{ route('districts.list.json', '') }}/" + this.value, function (data) {
                        $("#inputDistrict option").remove().append("")
                        $.each(data, function (key, value) {
                            $("#inputDistrict").append(new Option(value.name, value.code));
                        });
                    }, "json");
                }
            );
            // get Kelurahan
            $("#inputDistrict").change(function () {
                    $.get("{{ route('villages.list.json', '') }}/" + this.value, function (data) {
                        $("#inputVillage option").remove().append("");
                        $.each(data, function (key, value) {
                            $("#inputVillage").append(new Option(value.name, value.code));
                        });
                    }, "json");
                }
            );
        });
    </script>
    <script>
        $("#DataSetting").addClass("menu-item-open");
    </script>
@endsection
