 @extends('layouts.admin')
@section('heading', 'Nilai Sikap')
@section('page')
    <li class="breadcrumb-item active">Nilai Sikap</li>
@endsection
@section('content')
    <div class="d-flex flex-row">
        <div class="flex-row-auto offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-column pt-4 h-100">
                        <div class="pb-5">
                            <div class="d-flex flex-column flex-center">
                                <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                    <span class="font-size-h1 symbol-label font-weight-boldest">@php $inisial = getInitials(Auth::user()->name) @endphp {{ $inisial }}</span>
                                </div>
                                <a class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{ Auth::user()->name }}</a>
                                <div class="font-weight-bold text-dark-50 font-size-sm pb-6">{{ Auth::user()->no_induk }}</div>
                            </div>
                            <div class="pt-1">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Kelas:</a>
                                    </div>
                                    <span class="text-muted font-weight-bold px-3 py-5">{{ $kelas->nama_kelas }}</span>
                                </div>
                                @php
                                    $bulan = date('m');
                                    $tahun = date('Y');
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Semester:</a>
                                    </div>
                                    <span class="text-muted font-weight-bold px-3 py-5">
                                        @if ($bulan > 6)
                                            {{ 'Semester Ganjil' }}
                                        @else
                                            {{ 'Semester Genap' }}
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45 symbol-light mr-4">
                                        <span class="symbol-label">
                                            <span class="svg-icon svg-icon-2x svg-icon-dark-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero" />
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">Tahun Pelajaran:</a>
                                    </div>
                                    <span class="text-muted font-weight-bold px-3 py-5">
                                        @if ($bulan > 6)
                                            {{ $tahun }}/{{ $tahun+1 }}
                                        @else
                                            {{ $tahun-1 }}/{{ $tahun }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-row-fluid ml-lg-8">
            <div class="card card-custom gutter-bs">
                <div class="card-header">
                    <h3 class="card-title">Nilai Sikap Santri</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-striped table-bordered table-hover table-checkable datatable" style="margin-top: 13px !important">
                        <thead class="text-uppercase">
                            <tr>
                                <th rowspan="2" class="ctr">No.</th>
                                <th rowspan="2">Nama Santri</th>
                                <th colspan="3" class="ctr">Nilai Sikap</th>
                            </tr>
                            <tr>
                                <th class="ctr">Teman</th>
                                <th class="ctr">Sendiri</th>
                                <th class="ctr">Guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_mapel }}</td>
                                    <td class="ctr">{{ $data->sikap($data->id)['sikap_1'] }}</td>
                                    <td class="ctr">{{ $data->sikap($data->id)['sikap_2'] }}</td>
                                    <td class="ctr">{{ $data->sikap($data->id)['sikap_3'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#liNilai").addClass("menu-item-open");
        $("#Sikapsantri").addClass("menu-item-active");
    </script>
@endsection
