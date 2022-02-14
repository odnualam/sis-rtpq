@extends('layouts.admin')
@section('heading', 'Edit User')
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
                            <a href="javascript: history.go(-1)" class="btn btn-default btn-sm">
                                <span><i class="flaticon2-left-arrow-1"></i></span>Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($user->role == 'Guru')
                                    <div class="form-group">
                                        <label for="id_card">ID Card</label>
                                        <input disabled type="text" id="id_card" name="id_card" value="{{ $user->id_card }}" class="form-control @error('id_card') is-invalid @enderror">
                                    </div>
                                @elseif ($user->role == 'Santri')
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input disabled type="text" id="nisn" name="nisn" value="{{ $user->nisn }}" class="form-control @error('nisn') is-invalid @enderror">
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" name="email" value="{{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="role">Level User</label>
                                    <select id="role" type="text"
                                        class="form-control @error('role') is-invalid @enderror  " name="role"
                                        value="{{ old('role') }}" autocomplete="role">
                                        <option value="">-- Select {{ __('Level User') }} --</option>
                                        <option value="Admin" {{ 'Admin' == $user->role ? 'selected' : '' }}>Admin</option>
                                        <option value="Guru" {{ 'Guru' == $user->role ? 'selected' : '' }}>Guru</option>
                                        <option value="Santri" {{ 'Santri' == $user->role ? 'selected' : '' }}>Santri</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    <span class="form-text text-muted">Kosongkan jika tidak ingin berubah.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $("#MasterData").addClass("menu-item-open");
    $("#liMasterData").addClass("menu-item-open");
    $("#DataUser").addClass("menu-item-open");
</script>
@endsection
