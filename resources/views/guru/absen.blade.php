 @extends('layouts.admin')
@section('heading', 'Data Absen Santri')
@section('page')
  <li class="breadcrumb-item active">Data Absen Santri</li>
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
                                <th class="ctr">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                                @foreach ($santri as $data)
                                    <input type="hidden" name="santri_id" value="{{$data->id}}">
                                    <tr>
                                        <td class="ctr">{{ $loop->iteration }}</td>
                                        <td class="ctr">{{ $data->nama_santri }}</td>
                                        <td class="ctr">{{ $data->jk }}</td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_1'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['ulha_1'] }}</div>
                                                <input type="hidden" name="ulha_1" class="ulha_1_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_1'] }}">
                                            @else
                                                <input type="text" name="ulha_1" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_1_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_2'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['ulha_2'] }}</div>
                                                <input type="hidden" name="ulha_2" class="ulha_2_{{$data->id}}" value="{{ $data->ulangan($data->id)['ulha_2'] }}">
                                            @else
                                                <input type="text" name="ulha_2" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center ulha_2_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr">
                                            @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uts'])
                                                <div class="text-center">{{ $data->ulangan($data->id)['uts'] }}</div>
                                                <input type="hidden" name="uts" class="uts_{{$data->id}}" value="{{ $data->ulangan($data->id)['uts'] }}">
                                            @else
                                                <input type="text" name="uts" maxlength="2" onkeypress="return inputAngka(event)" style="margin: auto;" class="form-control text-center uts_{{$data->id}}" autocomplete="off">
                                            @endif
                                        </td>
                                        <td class="ctr sub_{{$data->id}}">
                                            @if ($data->nilai($data->id))
                                                <i class="fas fa-check" style="font-weight:bold;"></i>
                                            @else
                                                <button type="button" id="submit-{{$data->id}}" class="btn btn-default btn_click" data-id="{{$data->id}}"><i class="nav-icon fas fa-save"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
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
