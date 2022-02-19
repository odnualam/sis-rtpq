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
                                <td>{{ ($data->status == 0) ? 'PENDING' : (($data->status == 1) ? 'BERHASIL' : 'GAGAL')  }}</td>
                                <td>{{ $data->tgl_bayar }}</td>
                                <td>{{ $data->jumlah_bayar }}</td>
                                <td>
                                    @if ($data->status == 0)
                                        <div class="btn-group">
                                            <form class="mr-1 update-status" action="{{ route('pembayaran.gagal', Crypt::encrypt($data->id)) }}" method="post">
                                                @csrf
                                                <button class="btn btn-icon btn-outline-danger btn-sm" title="Status Gagal">
                                                    <i class="flaticon2-cancel"></i>
                                                </button>
                                            </form>

                                            <form class="update-status" action="{{ route('pembayaran.berhasil', Crypt::encrypt($data->id)) }}" method="post">
                                                @csrf
                                                <button class="btn btn-icon btn-outline-primary btn-sm" title="Status Berhasil">
                                                    <i class="flaticon2-check-mark"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
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
        $(function(){
            $("form.update-status button").click(function(e) {
                e.preventDefault();
                var form = $(this).parent();
                Swal.fire({
                    title: 'Update?',
                    text: "Data Tidak Dapat Diupdate Kembali!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, update!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            "Diupdate!",
                            "Data telah diupdate.",
                            "success"
                        )
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
