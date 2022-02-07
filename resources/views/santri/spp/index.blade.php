@extends('layouts.admin')
@section('heading', 'Pembayaran SPP')
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
                        <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal"
                            data-target=".bayar-spp">
                            <i class="flaticon-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable"
                    style="margin-top: 13px !important">
                    <thead class="text-uppercase">
                        <tr>
                            <th>No.</th>
                            <th>Kode Pembayaran</th>
                            <th>NISN</th>
                            <th>Nama Santri</th>
                            <th>Kelas</th>
                            <th>tgl dibayar</th>
                            <th>bulan dibayar</th>
                            <th>tahun dibayar</th>
                            <th>Jumlah bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spp as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->nisn }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kelas->nama_kelas }}</td>
                            <td>{{ $data->tgl_dibayar }}</td>
                            <td>{{ $data->bulan_dibayar }}</td>
                            <td>{{ $data->tahun_dibayar }}</td>
                            <td>{{ $data->jumlah_bayar }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bayar-spp" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul-jadwal">Bayar SPP</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spp.santri.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tgl_dibayar">Tanggal Bayar</label>
                                <input type="date" id="tgl_dibayar" name="tgl_dibayar" class="form-control @error('tgl_dibayar') is-invalid @enderror" placeholder="{{ __('Tangga Bayar') }}">
                            </div>
                            <div class="form-group">
                                <label for="bulan_dibayar">Bulan</label>
                                <select id="bulan_dibayar" name="bulan_dibayar" class="form-control @error('bulan_dibayar') is-invalid @enderror  ">
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="januari" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'januari')? 'selected' : '')}}>Januari</option>
                                    <option value="febuari" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'febuari')? 'selected' : '')}}>febuari</option>
                                    <option value="maret" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'maret')? 'selected' : '')}}>maret</option>
                                    <option value="april" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'april')? 'selected' : '')}}>april</option>
                                    <option value="mei" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'mei')? 'selected' : '')}}>mei</option>
                                    <option value="juni" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'juni')? 'selected' : '')}}>juni</option>
                                    <option value="juli" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'juli')? 'selected' : '')}}>juli</option>
                                    <option value="agustus" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'agustus')? 'selected' : '')}}>agustus</option>
                                    <option value="september" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'september')? 'selected' : '')}}>september</option>
                                    <option value="oktober" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'oktober')? 'selected' : '')}}>oktober</option>
                                    <option value="november" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'november')? 'selected' : '')}}>november</option>
                                    <option value="desember" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'desember')? 'selected' : '')}}>desember</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun_dibayar">Tahun Bayar</label>
                                <input type="number" id="tahun_dibayar" name="tahun_dibayar" class="form-control @error('tahun_dibayar') is-invalid @enderror" placeholder="{{ __('Tahun Bayar') }}">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                <input type="text" id="dengan-rupiah" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" placeholder="{{ __('Jumlah Bayar') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambah</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        var dengan_rupiah = document.getElementById("dengan-rupiah");
        dengan_rupiah.addEventListener("keyup", function (e) {
            dengan_rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

    </script>
@endsection
