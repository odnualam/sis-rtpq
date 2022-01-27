 @extends('layouts.admin')
@section('heading', 'Show Nilai Sikap')
@section('page')
    <li class="breadcrumb-item active">Show Nilai Sikap</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">Show Nilai Sikap</h3>
            </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" style="margin-top: -10px;">
                            <tr>
                                <td>No Induk Santri</td>
                                <td>:</td>
                                <td>{{ $santri->no_induk }}</td>
                            </tr>
                            <tr>
                                <td>Nama Santri</td>
                                <td>:</td>
                                <td>{{ $santri->nama_santri }}</td>
                            </tr>
                            <tr>
                                <td>Nama Kelas</td>
                                <td>:</td>
                                <td>{{ $kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td>Wali Kelas</td>
                                <td>:</td>
                                <td>{{ $kelas->guru->nama_guru }}</td>
                            </tr>
                            @php
                                $bulan = date('m');
                                $tahun = date('Y');
                            @endphp
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>
                                    @if ($bulan > 6)
                                        {{ 'Semester Ganjil' }}
                                    @else
                                        {{ 'Semester Genap' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>:</td>
                                <td>
                                    @if ($bulan > 6)
                                        {{ $tahun }}/{{ $tahun+1 }}
                                    @else
                                        {{ $tahun-1 }}/{{ $tahun }}
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                            <thead class="text-uppercase">
                                <tr>
                                    <th rowspan="2" class="ctr">No.</th>
                                    <th rowspan="2">Nama Santri</th>
                                    <th colspan="3" class="ctr">Nilai Sikap</th>
                                </tr>
                                <tr>
                                    <th class="ctr">Teman</th>
                                    <th class="ctr">Sendiri</th>
                                    <th class="ctr">Guru</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($mapel as  $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nama_mapel }}</td>
                                            @php
                                                $array = array('mapel' => $data->id, 'santri' => $santri->id);
                                                $jsonData = json_encode($array);
                                            @endphp
                                            <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_1'] }}</td>
                                            <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_2'] }}</td>
                                            <td class="ctr">{{ $data->cekSikap($jsonData)['sikap_3'] }}</td>
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
        $("#Sikap").addClass("menu-item-open");
    </script>
@endsection
