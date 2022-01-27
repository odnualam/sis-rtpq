 @extends('layouts.admin')
@section('heading', 'Nilai Rapot')
@section('page')
    <li class="breadcrumb-item active">Nilai Rapot</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">Nilai Rapot</h3>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                    <thead class="text-uppercase">
                        <tr>
                        <th>No.</th>
                        <th>Nama Kelas</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kelas }}</td>
                            <td><a href="{{ route('rapot-santri', Crypt::encrypt($data->id)) }}" class="btn btn-icon btn-outline-success btn-sm"><i class="flaticon-eye"></i></a></td>
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
      $("#Nilai").addClass("menu-item-open");
      $("#liNilai").addClass("menu-item-open");
      $("#Rapot").addClass("menu-item-open");
    </script>
@endsection
