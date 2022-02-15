 @extends('layouts.admin')
@section('heading', 'Pilih Kelas')
@section('page')
    <li class="breadcrumb-item active">Pilih Kelas</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h3 class="card-label">@yield('heading')</h3>
                    </div>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
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
                                <td><a href="{{ route('show.sikap.mapel', Crypt::encrypt($val)) }}" class="btn btn-icon btn-outline-primary btn-sm"><i class="flaticon-medical"></i></a></td>
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
    $("#SikapGuru").addClass("menu-item-active");
  </script>
@endsection
