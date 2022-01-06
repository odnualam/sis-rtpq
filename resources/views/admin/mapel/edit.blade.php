 @extends('layouts.admin')
@section('heading', 'Edit Mapel')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('mapel.index') }}">Mapel</a></li>
    <li class="breadcrumb-item active">Edit Mapel</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">@yield('heading')</h3>
                </div>
                <form action="{{ route('mapel.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                                <div class="form-group">
                                <label for="nama_mapel">Nama Mapel</label>
                                <input type="text" id="nama_mapel" name="nama_mapel" value="{{ $mapel->nama_mapel }}" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="{{ __('Nama Mata Pelajaran') }}">
                                </div>
                                <div class="form-group">
                                <label for="paket_id">Paket</label>
                                <select id="paket_id" name="paket_id" class="form-control @error('paket_id') is-invalid @enderror  ">
                                    <option value="">-- Pilih Paket Mapel --</option>
                                    <option value="9"
                                        @if ($mapel->paket_id == '9')
                                            selected
                                        @endif
                                    >Semua</option>
                                    @foreach ($paket as $data)
                                    <option value="{{ $data->id }}"
                                        @if ($mapel->paket_id == $data->id)
                                            selected
                                        @endif
                                    >{{ $data->ket }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelompok">Kelompok</label>
                                    <select id="kelompok" name="kelompok" class="  form-control @error('kelompok') is-invalid @enderror">
                                        <option value="">-- Pilih Kelompok Mapel --</option>
                                        <option value="A"
                                            @if ($mapel->kelompok == 'A')
                                                selected
                                            @endif
                                        >Pelajaran Umum</option>
                                        <option value="B"
                                            @if ($mapel->kelompok == 'B')
                                                selected
                                            @endif
                                        >Pelajaran Khusus</option>
                                        <option value="C"
                                            @if ($mapel->kelompok == 'C')
                                                selected
                                            @endif
                                        >Pelajaran Keahlian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="#" name="kembali" class="btn btn-default" id="back"><span><i class="flaticon2-left-arrow-1"></i></span>Kembali</a> &nbsp;
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('mapel.index') }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataMapel").addClass("active");
</script>
@endsection