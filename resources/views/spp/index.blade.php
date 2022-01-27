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
                            <button type="button" class="btn btn-icon btn-outline-primary btn-sm" data-toggle="modal" onclick="getCreateKelas()" data-target="#form-kelas">
                                <i class="flaticon-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                        <thead class="text-uppercase">
                            <tr>
                                <th>No.</th>
                                <th>Nama Santri</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santri as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="#" onclick="getSubsJadwal({{$data->id}})" data-toggle="modal" data-target=".view-jadwal">{{ $data->nama_santri }}</a></td>
                                    <td>{{ $data->kelas->nama_kelas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl view-jadwal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judul-jadwal">View Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jadwal</th>
                                            <th>Jam Pelajaran</th>
                                            <th>Ruang Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-jadwal">
                                    </tbody>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                        <a id="link-jadwal" href="#" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> &nbsp;
                            Download PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
