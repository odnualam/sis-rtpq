 @extends('layouts.admin')
@section('heading', 'Pengumuman')
@section('page')
    <li class="breadcrumb-item active">Pengumuman</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">@yield('heading')</h3>
                </div>
                <form class="form-group" action="{{ route('admin.pengumuman.simpan') }}" method="post">
                    @csrf
                    <div class="card-body pad">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $pengumuman->id }}">
                            <textarea class="textarea @error('isi') is-invalid @enderror" name="isi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $pengumuman->isi }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#Pengumuman").addClass("menu-item-open");
    </script>
@endsection
