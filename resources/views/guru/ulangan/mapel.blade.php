@extends('layouts.admin')
@section('heading', 'Pilih Mata Pelajaran')
@section('content')
<div class="d-flex flex-row">
    <div class="flex-row-fluid ml-lg-12">
        <div class="card card-custom gutter-bs">
            <div class="card-header py-3">
                <div class="card-title">
                    <h3 class="card-label">@yield('heading')</h3>
                </div>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline mr-2">
                        <a href="{{ route('ulangan.index') }}" class="btn btn-default btn-sm">
                            <span><i class="flaticon2-left-arrow-1"></i></span>Pilih Kelas
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table
                            class="table table-striped table-bordered table-hover table-checkable datatable"
                            style="margin-top: 13px !important">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Mapel</th>
                                    <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($mengajar as $val => $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data[0]->rapot($val)->nama_mapel }}</td>
                                    <td>
                                        <a href="{{ route('ulangan.show', Crypt::encrypt($data[0]->id)) }}" class="btn btn-icon btn-outline-primary btn-sm">
                                            <i class="flaticon-medical"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  <script>
    $("#liNilaiGuru").addClass("menu-item-open");
    $("#UlanganGuru").addClass("menu-item-active");
  </script>
@endsection
