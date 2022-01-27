@extends('layouts.admin')
@section('heading', 'Profile')
@section('page')
    <li class="breadcrumb-item active">User Profile</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-custom gutter-b">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if (Auth::user()->role == 'Guru')
                            <a href="{{ asset(Auth::user()->guru(Auth::user()->id_card)->foto) }}" data-toggle="lightbox" data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery" data-footer='<a href="{{ route('pengaturan.edit-foto') }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset(Auth::user()->guru(Auth::user()->id_card)->foto) }}" width="130px" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                            </a>
                        @elseif (Auth::user()->role == 'Santri')
                            <a href="{{ asset(Auth::user()->santri(Auth::user()->no_induk)->foto) }}" data-toggle="lightbox" data-title="Foto {{ Auth::user()->name }}" data-gallery="gallery" data-footer='<a href="{{ route('pengaturan.edit-foto') }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset(Auth::user()->santri(Auth::user()->no_induk)->foto) }}" width="130px" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                            </a>
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/male.jpg') }}" alt="User profile picture">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                    @if (Auth::user()->role == 'Guru')
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Id Card</span> <a class="text-muted float-right">{{ Auth::user()->id_card }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">NIP</span> <a class="text-muted float-right">{{ Auth::user()->guru(Auth::user()->id_card)->nip }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Email</span> <a class="text-muted float-right">{{ Auth::user()->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Guru Mapel</span> <a class="text-muted float-right">{{ Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Kode Jadwal</span> <a class="text-muted float-right">{{ Auth::user()->guru(Auth::user()->id_card)->kode }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Tempat Lahir</span> <a class="text-muted float-right">{{ Auth::user()->guru(Auth::user()->id_card)->tmp_lahir }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Tanggal Lahir</span> <a class="text-muted float-right">{{ date('l, d F Y', strtotime(Auth::user()->guru(Auth::user()->id_card)->tgl_lahir)) }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">No Telepon</span> <a class="text-muted float-right">{{ Auth::user()->guru(Auth::user()->id_card)->telp }}</a>
                            </li>
                        </ul>
                    @elseif (Auth::user()->role == 'Santri')
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">No Induk</span> <a class="text-muted float-right">{{ Auth::user()->no_induk }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">NIS</span> <a class="text-muted float-right">{{ Auth::user()->santri(Auth::user()->no_induk)->nis }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Tempat Lahir</span> <a class="text-muted float-right">{{ Auth::user()->santri(Auth::user()->no_induk)->kelas->nama_kelas }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Tempat Lahir</span> <a class="text-muted float-right">{{ Auth::user()->santri(Auth::user()->no_induk)->tmp_lahir }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">Tanggal Lahir</span> <a class="text-muted float-right">{{ date('l, d F Y', strtotime(Auth::user()->santri(Auth::user()->no_induk)->tgl_lahir)) }}</a>
                            </li>
                            <li class="list-group-item">
                                <span class="font-weight-bold text-uppercase">No Telepon</span> <a class="text-muted float-right">{{ Auth::user()->santri(Auth::user()->no_induk)->telp }}</a>
                            </li>
                        </ul>
                    @else
                    @endif

                    <a href="{{ route('pengaturan.profile') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                </div>
            </div>

            <div class="card card-custom gutter-b mt-8">
                <div class="card-header">
                    <h3 class="card-title">Pengaturan Akun</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td width="50"><i class="nav-icon fas fa-envelope"></i></td>
                            <td>Ubah Email</td>
                            <td width="50"><a href="{{ route('pengaturan.email') }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>
                        <tr>
                            <td width="50"><i class="nav-icon fas fa-key"></i></td>
                            <td>Ubah Password</td>
                            <td width="50"><a href="{{ route('pengaturan.password') }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
