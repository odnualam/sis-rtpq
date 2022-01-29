 @extends('layouts.admin')
@section('heading', 'Data Kelas')
@section('page')
  <li class="breadcrumb-item active">Data Kelas</li>
@endsection
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
                                <th>Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kelas }}</td>
                                <td>{{ $data->guru->nama_guru }}</td>
                                <td>
                                    {{-- <form action="{{ route('kelas.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('delete') --}}
                                        <button type="button" class="btn btn-icon btn-outline-info btn-sm" onclick="getSubssantri({{$data->id}})"
                                            data-toggle="modal" data-target=".view-santri">
                                            <i class="flaticon-user"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-outline-info btn-sm" onclick="getSubsJadwal({{$data->id}})"
                                            data-toggle="modal" data-target=".view-jadwal">
                                            <i class="flaticon-calendar-1"></i>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-outline-success btn-sm"
                                            onclick="getEditKelas({{$data->id}})" data-toggle="modal" data-target="#form-kelas">
                                            <i class="flaticon-edit"></i>
                                        </button>
                                        {{-- <button onclick="return confirm('Apa kamu yakin?')" class="btn btn-icon btn-outline-danger btn-sm"><i class="flaticon2-trash"></i></button> --}}
                                    {{-- </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-md" id="form-kelas" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form" action="{{ route('kelas.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="id" name="id">
                                <div class="form-group" id="form_nama"></div>
                                <div class="form-group" id="form_paket"></div>
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <input type='text' id="nama_kelas" onkeyup="this.value = this.value.toUpperCase()" name='nama_kelas' class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="{{ __('Nama Kelas') }}">
                                </div>
                                <div class="form-group">
                                    <label for="guru_id">Wali Kelas</label>
                                    <select id="guru_id" name="guru_id" class=" form-control @error('guru_id') is-invalid @enderror">
                                        <option value="" selected disabled hidden>--Pilih Wali Kelas--</option>
                                        @foreach ($guru as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg view-santri" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="judul-santri">View Santri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-hover table-checkable datatable" width="100%">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Foto</th>
                                            <th>NISN</th>
                                            <th>Nama Santri</th>
                                            <th>Jenis Kelamin</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-santri">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                        <a id="link-santri" href="#" class="btn btn-primary" target="_blank"><i class="nav-icon fas fa-download"></i> &nbsp;Download PDF</a>
                    </div>
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
                                <table class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important" width="100%">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jadwal</th>
                                            <th>Jam Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-jadwal">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Jadwal</th>
                                            <th>Jam Pelajaran</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</button>
                        <a id="link-jadwal" target="_blank" href="#" class="btn btn-primary"><i class="nav-icon fas fa-download"></i> &nbsp;Download PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    function getCreateKelas(){
        $("#form")[0].reset();
        $("#judul").text('Tambah Data Kelas');
        $('#id').val('');
        $('#nama_kelas').val('');
        $('#guru_id').val('');
    }

    function getEditKelas(id){
        var parent = id;
        $.ajax({
            type:"GET",
            data:"id="+parent,
            dataType:"JSON",
            url:"{{ url('/kelas/edit/json') }}",
            success:function(result){
                if(result){
                    $.each(result,function(index, val){
                        $("#judul").text('Edit Data Kelas ' + val.nama);
                        $('#id').val(val.id);
                        $('#nama_kelas').val(val.nama);
                        $('#guru_id').val(val.guru_id).trigger('change');
                    });
                }
            },
            error:function(){
                toastr.error("Errors 404!");
            }
        });
    }

    function getSubssantri(id){
        var parent = id;
        $.ajax({
            type:"GET",
            data:"id="+parent,
            dataType:"JSON",
            url:"{{ url('/santri/view/json') }}",
            success:function(result){
                var santri = "";
                if(result){
                    $.each(result,function(index, val){
                    $("#judul-santri").text('View Data Santri ' + val.kelas);
                    santri += "<tr>";
                        santri += "<td><img src='"+val.foto+"' width='100px'></td>";
                        santri += "<td>"+val.nisn+"</td>";
                        santri += "<td>"+val.nama_santri+"</td>";
                        santri += "<td>"+val.jk+"</td>";
                    santri+="</tr>";
                    });
                    $("#data-santri").html(santri);
                }
            },
            error:function(){
                toastr.error("Errors 404!");
            }
        });
        $("#link-santri").attr("href", "{{ url('/listsantripdf') }}/"+id);
    }

    function getSubsJadwal(id){
        var parent = id;
        $.ajax({
            type:"GET",
            data:"id="+parent,
            dataType:"JSON",
            url:"{{ url('/jadwal/view/json') }}",
            success:function(result){
                var jadwal = "";
                if(result){
                    $.each(result,function(index, val){
                        $("#judul-jadwal").text('View Data Jadwal ' + val.kelas);
                        jadwal += "<tr>";
                            jadwal += "<td>"+val.hari+"</td>";
                            jadwal += "<td><h5 class='card-title'>"+val.mapel+"</h5><p class='card-text'><small class='text-muted'>"+val.guru+"</small></p></td>";
                            jadwal += "<td>"+val.jam_mulai+" - "+val.jam_selesai+"</td>";
                        jadwal+="</tr>";
                    });
                    $("#data-jadwal").html(jadwal);
                }
            },
            error:function(){
                toastr.error("Errors 404!");
            }
        });
        $("#link-jadwal").attr("href", "{{ url('/jadwalkelaspdf') }}/"+id);
    }

    $("#MasterData").addClass("menu-item-open");
    $("#liMasterData").addClass("menu-item-open");
    $("#DataKelas").addClass("menu-item-open");
</script>
@endsection
