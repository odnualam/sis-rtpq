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
                            data-target=".tambah-data-pembayaran">
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
                            <th>Kode</th>
                            <th>Untuk Bulan</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tanggal Bayar</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $data)
                            <tr>
                                <td>{{ $data->kode }}</td>
                                <td>{!! '<span class="label label-primary label-inline font-weight-lighter mr-2">'.date('F', mktime(0, 0, 0, $data->bulan_dibayar, 10)).'</span>' !!}</td>
                                <td>{!! $data->jenis_pembayaran == 0 ? 'TUNAI' : '<a href="'.asset('uploads/bukti-non-tunai/'.$data->bukti_non_tunai).'" target="_blank">NON TUNAI</a>' !!}</td>
                                <td>{{ ($data->status == 0) ? 'PENDING' : (($data->status == 1) ? 'SUCCESS' : 'GAGAL')  }}</td>
                                <td>{{ $data->tgl_bayar }}</td>
                                <td>{{ $data->jumlah_bayar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg tambah-data-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('spp.santri.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="santri_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="id_spp">Tahun SPP</label>
                        <select id="id_spp" name="id_spp" class="form-control @error('id_spp') is-invalid @enderror">
                            <option value="">-- Pilih Tahun SPP --</option>
                            @foreach($spp as $data)
                                <option value="{{ $data->id }}">{{ $data->tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bulan_dibayar">Bulan</label>
                        <select id="bulan_dibayar" name="bulan_dibayar" class="form-control @error('bulan_dibayar') is-invalid @enderror">
                            <option value="">-- Pilih Bulan --</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="<?= $i ?>"><?= date('F', strtotime('2020-'.$i.'-01')) ?></option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <select id="jenis_pembayaran" name="jenis_pembayaran" class="form-control @error('jenis_pembayaran') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Pembayaran --</option>
                            <option value="0">Tunai</option>
                            <option value="1">Non Tunai</option>
                        </select>
                    </div>

                    <div class="form-group" id="bukti_non_tunai">
                        <label for="bukti_non_tunai">Upload Bukti Pembayaran</label>
                        <input type="file" name="bukti_non_tunai" class="form-control" id="bukti_non_tunai">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_bayar">Jumlah Pembayaran</label>
                        <input type="text" id="dengan-rupiah" name="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" placeholder="{{ __('Jumlah Pembayaran') }}">
                    </div>

                    <div class="form-group">
                        <label for="tgl_bayar">Tanggal Pembayaran</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control @error('tgl_bayar') is-invalid @enderror" placeholder="{{ __('Tanggal Melakukan Pembayaran') }}">
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
                    </div>
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
        $("#SantriSPP").addClass("menu-item-open");
    </script>

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

    <script>
        $('#jenis_pembayaran').change(function() {
            if ($(this).val() == "1") {
                $('#bukti_non_tunai').show();
            } else {
                $('#bukti_non_tunai').hide();
            }
        });
        $('#jenis_pembayaran').trigger('change');
    </script>
@endsection
