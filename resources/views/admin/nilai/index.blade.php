 @extends('layouts.admin')
@section('heading', 'Data Deskripsi Predikat')
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
                <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                    <thead class="text-uppercase">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Guru Mata Pelajaran</th>
                        <th rowspan="2">KKM</th>
                        <th colspan="4" class="text-center">Predikat</th>
                    </tr>
                    <tr>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($mengajar as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <h5 class="card-title">{{ $data->mapel->nama_mapel }}</h5>
                                    <p class="card-text"><small class="text-muted">{{ $data->guru->nama_guru }}</small></p>
                                </td>
                                @if ($data->dsk($data->guru_id))
                                    <td>{{ $data->dsk($data->guru_id)->kkm }}</td>
                                    <td>{{ $data->dsk($data->guru_id)->deskripsi_a ? $data->dsk($data->guru_id)->deskripsi_a : '-' }}</td>
                                    <td>{{ $data->dsk($data->guru_id)->deskripsi_b ? $data->dsk($data->guru_id)->deskripsi_b : '-' }}</td>
                                    <td>{{ $data->dsk($data->guru_id)->deskripsi_c ? $data->dsk($data->guru_id)->deskripsi_c : '-' }}</td>
                                    <td>{{ $data->dsk($data->guru_id)->deskripsi_d ? $data->dsk($data->guru_id)->deskripsi_d : '-' }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
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
        $("#Nilai").addClass("menu-item-open");
        $("#liNilai").addClass("menu-item-open");
        $("#Deskripsi").addClass("menu-item-open");
    </script>
@endsection
