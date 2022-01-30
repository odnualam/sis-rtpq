 @extends('layouts.admin')
@section('heading', 'Edit Mengajar')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Mengajar</h3>
                </div>
                <form action="{{ route('mengajar.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="mengajar_id" value="{{ $mengajar->id }}">
                            <div class="form-group">
                                <label for="mapel_id">Mata Pelajaran</label>
                                <select id="mapel_id" name="mapel_id"
                                    class="form-control @error('mapel_id') is-invalid @enderror  ">
                                    <option value="">-- Pilih Mapel --</option>
                                    @foreach ($mapel as $data)
                                    <option value="{{ $data->id }}" @if ($mengajar->mapel_id == $data->id)
                                        selected
                                        @endif
                                        >{{ $data->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select id="kelas_id" name="kelas_id"
                                    class="form-control @error('kelas_id') is-invalid @enderror  ">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}" @if ($mengajar->kelas_id == $data->id)
                                        selected
                                        @endif
                                        >{{ $data->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="guru_id">Pengajar</label>
                                <select id="guru_id" name="guru_id"
                                    class="form-control @error('guru_id') is-invalid @enderror  ">
                                    <option value="" @if ($mengajar->guru_id)
                                        selected
                                        @endif>-- Pilih Guru --</option>
                                    @foreach ($guru as $data)
                                    <option value="{{ $data->id }}" @if ($mengajar->guru_id == $data->id)
                                        selected
                                        @endif
                                        >{{ $data->nama_guru }}</option>
                                    @endforeach
                                </select>
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
            window.location="{{ route('mengajar.index') }}";
        });
    });
    $("#MasterData").addClass("menu-item-open");
    $("#liMasterData").addClass("menu-item-open");
    $("#DataMengajar").addClass("menu-item-open");
</script>
@endsection
