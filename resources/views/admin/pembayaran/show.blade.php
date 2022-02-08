@extends('layouts.admin')
@section('heading')
    Data Pembayaran Kelas {{ $kelas->nama_kelas }}
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
                        <a href="{{ route('data-pembayaran.index') }}" class="btn btn-default btn-sm">
                            <span><i class="flaticon2-left-arrow-1"></i></span>Kembali
                        </a>
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
                            <th>Nama Santri</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tanggal Bayar</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $data)
                            <tr>
                                <td>{{ $data->kode }}</td>
                                <td>{!! '<span class="label label-primary label-inline font-weight-lighter mr-2">'.date('F', mktime(0, 0, 0, $data->bulan_dibayar, 10)).'</span>' !!}</td>
                                <td>{{ $data->santri->nama_santri }}</td>
                                <td>{!! $data->jenis_pembayaran == 0 ? 'TUNAI' : '<a href="'.asset('uploads/bukti-non-tunai/'.$data->bukti_non_tunai).'" target="_blank">NON TUNAI</a>' !!}</td>
                                <td>{{ ($data->status == 0) ? 'PENDING' : (($data->status == 1) ? 'SUCCESS' : 'GAGAL')  }}</td>
                                <td>{{ $data->tgl_bayar }}</td>
                                <td>{{ $data->jumlah_bayar }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form class="mr-1" action="{{ route('pembayaran.gagal', Crypt::encrypt($data->id)) }}" method="post">
                                            @csrf
                                            <button class="btn btn-icon btn-outline-danger btn-sm" title="Status Gagal">
                                                <i class="flaticon2-cancel"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('pembayaran.berhasil', Crypt::encrypt($data->id)) }}" method="post">
                                            @csrf
                                            <button class="btn btn-icon btn-outline-primary btn-sm" title="Status Berhasil">
                                                <i class="flaticon2-check-mark"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
