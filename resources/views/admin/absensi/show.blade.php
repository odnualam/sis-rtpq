@extends('layouts.admin')
@section('heading')
    Data Absensi Santri Kelas {{ $kelas->nama_kelas }}
@endsection
@section('content')
    @php
        $no = 1;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label">@yield('heading')</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('absen.simpan') }}" method="post" id="my_form">
                        @csrf
                        <input type="hidden" name="tahun_ajaran" value="{{ __tahun_ajaran__() }}">
                        <input type="hidden" name="semester" value="{{ __semester__(date('n')) }}">

                        <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Santri</th>
                                    <th>Jenis Kelamin</th>
                                    <th width="70px">Sakit (S)</th>
                                    <th width="70px">Ijin (I)</th>
                                    <th width="70px">Alpa (A)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($santri as $data)
                                    <input type="text" name="santri_id[]" value="{{ $data->id }}" style="display: none">
                                    <input type="text" name="kelas_id" value="{{ $kelas->id }}" style="display: none">
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nisn }}</td>
                                        <td>{{ $data->nama_santri }}</td>
                                        <td>{{ $data->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>
                                            <input value="{{ $data->absen_s ?: '0' }}" type="text" name="absen_s[]" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center">
                                        </td>
                                        <td>
                                            <input value="{{ $data->absen_i ?: '0' }}" type="text" name="absen_i[]" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center">
                                        </td>
                                        <td>
                                            <input value="{{ $data->absen_a ?: '0' }}" type="text" name="absen_a[]" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#AbsenGuru").addClass("menu-item-open");
    </script>
@endsection
