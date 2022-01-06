 @extends('layouts.admin')
@section('heading', 'Ubah Email')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
    <li class="breadcrumb-item active">Ubah Email</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title text-capitalize">Ubah Email {{ Auth::user()->name }}</h3>
            </div>
            <form action="{{ route('pengaturan.ubah-email') }}" method="post">
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email-old">Email Lama</label>
                            <input id="email-old" type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Baru</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autofocus autocomplete="off">
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
            window.location="{{ route('profile') }}";
        });
    });
</script>
@endsection