 @extends('layouts.admin')
@section('heading', 'Pilih Kelas')
@section('content')
    <div class="d-flex flex-row">
        <div class="flex-row-fluid ml-lg-12">
            <div class="card card-custom gutter-bs">
                <div class="card-header">
                    <h3 class="card-title">Pilih Kelas</h3>
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
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $val => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data[0]->rapot($val)->nama_kelas }}</td>
                                        <td>
                                            <a href="{{ route('show.ulangan.mapel', Crypt::encrypt($val)) }}" class="btn btn-icon btn-outline-primary btn-sm">
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
