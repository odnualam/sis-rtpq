 @extends('layouts.admin')
@section('heading')
  Data User @foreach ($role as $d => $data) {{ $d }} @endforeach
@endsection
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('user.index') }}">User</a></li>
    @foreach ($role as $d => $data)
        <li class="breadcrumb-item active">{{ $d }}</li>
    @endforeach
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
                        <a href="{{ route('user.index') }}" class="btn btn-default btn-sm">
                            <span><i class="flaticon2-left-arrow-1"></i></span>Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                <thead class="text-uppercase">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        @foreach ($role as $d => $data)
                            @if ($d == 'Guru')
                            <th>No Id Card</th>
                            @elseif ($d == 'Santri')
                            <th>NISN</th>
                            @else

                            @endif
                        @endforeach
                        {{-- <th>Tanggal Register</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user->count() > 0)
                    @foreach ($user as $data)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-capitalize">{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        @if ($data->role == 'Santri')
                            <td>{{ $data->nisn }}</td>
                        @elseif ($data->role == 'Guru')
                            <td>{{ $data->id_card }}</td>
                        @else
                        @endif
                        {{-- <td>{{ $data->created_at->format('l, d F Y') }}</td> --}}
                        <td>
                            <form class="delete_form" action="{{ route('user.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-icon btn-outline-danger btn-sm"><i class="flaticon-delete"></i></button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
                    </tr>
                    @endif
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("menu-item-open");
        $("#liMasterData").addClass("menu-item-open");
        $("#DataUser").addClass("menu-item-open");
    </script>
@endsection
