 @extends('layouts.admin')
@section('heading', 'Entry Nilai Ulangan')
@section('page')
    <li class="breadcrumb-item active">Entry Nilai Ulangan</li>
@endsection
@section('content')
    <div class="d-flex flex-row">
        <div class="flex-row-auto offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-column pt-4 h-100">
                        <div class="pb-5">
                            <div class="d-flex flex-column flex-center">
                                <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                    <span class="font-size-h1 symbol-label font-weight-boldest">@php $inisial =
                                        getInitials($guru->nama_guru) @endphp {{ $inisial }}</span>
                                </div>
                                <a
                                    class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{
                                    $guru->nama_guru }}</a>
                                <div class="font-weight-bold text-dark-50 font-size-sm pb-6">{{ $guru->mapel->nama_mapel }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-row-fluid ml-lg-8">
            <div class="card card-custom gutter-bs">
                <div class="card-header">
                    <h3 class="card-title">Entry Nilai Ulangan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example2"
                                class="table table-striped table-bordered table-hover table-checkable datatable"
                                style="margin-top: 13px !important">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $val => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data[0]->rapot($val)->nama_kelas }}</td>
                                        <td><a href="{{ route('ulangan.show', Crypt::encrypt($val)) }}"
                                                class="btn btn-primary btn-sm"><i class="nav-icon fas fa-pen"></i> &nbsp;
                                                Entry Nilai</a></td>
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
