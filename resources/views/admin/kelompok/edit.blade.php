 @extends('layouts.admin')
@section('heading', 'Edit Kelompok Mapel')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('kelompok.index') }}">Kelompok Mapel</a></li>
    <li class="breadcrumb-item active">Edit Kelompok Mapel</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">@yield('heading')</h3>
                </div>
                <form action="{{ route('kelompok.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="kelompok_id" value="{{ $kelompok->id }}">
                                <div class="form-group">
                                    <label for="jenis">Jenis</label>
                                    <input type="text" id="jenis" name="jenis" value="{{ $kelompok->jenis }}" class="form-control @error('jenis') is-invalid @enderror" placeholder="{{ __('Jenis') }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kelompok</label>
                                    <input type="text" id="nama" name="nama" value="{{ $kelompok->nama }}" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Kelompok Mapel') }}">
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
        window.location="{{ route('kelompok.index') }}";
        });
    });
    $("#MasterData").addClass("menu-item-open");
    $("#liMasterData").addClass("menu-item-open");
    $("#DataMapel").addClass("menu-item-open");
</script>
@endsection
