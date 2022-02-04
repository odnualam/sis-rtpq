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
                                <label for="kelompok_id">Kelompok</label>
                                <select id="kelompok_id" name="kelompok_id" class="form-control @error('kelompok_id') is-invalid @enderror  ">
                                    <option value="">-- Pilih Kelompok Mapel --</option>
                                    @foreach ($kelompok as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($mapel->kelompok_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="urutan">Nomor Urut</label>
                                    <input type="number" id="urutan" name="urutan" value="{{ $mapel->urutan }}"
                                        class="form-control @error('urutan') is-invalid @enderror"
                                        placeholder="{{ __('Nomor Urut') }}">
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
    $("#MasterData").addClass("menu-item-open");
    $("#liMasterData").addClass("menu-item-open");
    $("#DataMapel").addClass("menu-item-open");
</script>
@endsection
