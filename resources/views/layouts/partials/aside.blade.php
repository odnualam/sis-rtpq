<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <img alt="Logo" src="{{ asset('admin/media/logos/logo-light.png') }}" />
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
                    <li class="menu-item" aria-haspopup="true" id="AdminHome">
                        <a href="{{ route('admin.home') }}" class="menu-link">
                            <i class="menu-icon flaticon2-layers"></i>
                            <span class="menu-text">Beranda</span>
                        </a>
                    </li>

                    <li class="menu-section">
                        <h4 class="menu-text">Master Data</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataSetting">
                        <a href="{{ route('setting.index') }}" class="menu-link">
                            <i class="menu-icon flaticon-home-2"></i>
                            <span class="menu-text">Data Identitas Sekolah</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataGuru">
                        <a href="{{ route('guru.index') }}" class="menu-link">
                            <i class="menu-icon flaticon-presentation-1"></i>
                            <span class="menu-text">Data Guru</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataKelas">
                        <a href="{{ route('kelas.index') }}" class="menu-link">
                            <i class="menu-icon flaticon-folder-1"></i>
                            <span class="menu-text">Data Kelas</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="Datasantri">
                        <a href="{{ route('santri.index') }}" class="menu-link">
                            <i class="menu-icon flaticon2-calendar-3"></i>
                            <span class="menu-text">Data Santri</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataUser">
                        <a href="{{ route('user.index') }}" class="menu-link">
                            <i class="menu-icon flaticon2-user"></i>
                            <span class="menu-text">Data User</span>
                        </a>
                    </li>

                    <li class="menu-section">
                        <h4 class="menu-text">Akademik</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataJadwal">
                        <a href="{{ route('jadwal.index') }}" class="menu-link">
                            <i class="menu-icon flaticon2-calendar-1"></i>
                            <span class="menu-text">Data Jadwal</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataMengajar">
                        <a href="{{ route('mengajar.index') }}" class="menu-link">
                            <i class="menu-icon flaticon-clock-2"></i>
                            <span class="menu-text">Data Mengajar</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="DataMapel">
                        <a href="{{ route('mapel.index') }}" class="menu-link">
                            <i class="menu-icon flaticon2-list-1"></i>
                            <span class="menu-text">Data Mata Pelajaran</span>
                        </a>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="liNilai">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <i class="menu-icon flaticon2-list-3"></i>
                            <span class="menu-text">Penilaian</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true" id="Ulangan">
                                    <a href="{{ route('ulangan-kelas') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nilai Ulangan</span>
                                    </a>
                                </li>

                                <li class="menu-item" aria-haspopup="true" id="Sikap">
                                    <a href="{{ route('sikap-kelas') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nilai Sikap</span>
                                    </a>
                                </li>

                                <li class="menu-item" aria-haspopup="true" id="Rapot">
                                    <a href="{{ route('rapot-kelas') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nilai Rapot</span>
                                    </a>
                                </li>

                                <li class="menu-item" aria-haspopup="true" id="Deskripsi">
                                    <a href="{{ route('predikat') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Deskripsi Predikat</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="Pengumuman">
                        <a href="{{ route('admin.pengumuman') }}" class="menu-link">
                            <i class="menu-icon flaticon2-speaker"></i>
                            <span class="menu-text">Pengumuman</span>
                        </a>
                    </li>

                    <li class="menu-section">
                        <h4 class="menu-text">Transaksi / Pembayaran</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="AbsensiGuru">
                        <a href="{{ route('spp.index') }}" class="menu-link">
                            <i class="menu-icon flaticon-coins"></i>
                            <span class="menu-text">SPP</span>
                        </a>
                    </li>

                    <li class="menu-section">
                        <h4 class="menu-text">Laporan / Lain-lain</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>


                @elseif (Auth::user()->role == 'Guru' && Auth::user()->guru(Auth::user()->id_card))
                    <li class="menu-item" aria-haspopup="true" id="Home">
                        <a href="{{ url('/') }}" class="menu-link">
                            <i class="menu-icon flaticon-home"></i>
                            <span class="menu-text">Beranda</span>
                        </a>
                    </li>

                    <li class="menu-section">
                        <h4 class="menu-text">Main Menu</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="AbsenGuru">
                        <a href="{{ route('absen') }}" class="menu-link">
                            <i class="menu-icon flaticon2-accept"></i>
                            <span class="menu-text">Absen</span>
                        </a>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="JadwalGuru">
                        <a href="{{ route('jadwal.guru') }}" class="menu-link">
                            <i class="menu-icon flaticon2-calendar-4"></i>
                            <span class="menu-text">Jadwal Guru</span>
                        </a>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="liNilaiGuru">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <i class="menu-icon flaticon2-list-3"></i>
                            <span class="menu-text">Penilaian</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true" id="UlanganGuru">
                                    <a href="{{ route('ulangan.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Entry Nilai Ulangan</span>
                                    </a>
                                </li>
                                @if ( Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Pendidikan Agama dan Budi Pekerti" || Auth::user()->guru(Auth::user()->id_card)->mapel->nama_mapel == "Pendidikan Pancasila dan Kewarganegaraan" )
                                    <li class="menu-item" aria-haspopup="true" id="SikapGuru">
                                        <a href="{{ route('sikap.index') }}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Entry Nilai Sikap</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="menu-item" aria-haspopup="true" id="RapotGuru">
                                    <a href="{{ route('rapot.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Entry Nilai Rapot</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true" id="DesGuru">
                                    <a href="{{ route('nilai.index') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Deskripsi Predikat</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @elseif (Auth::user()->role == 'Santri' && Auth::user()->santri(Auth::user()->nisn))
                    <li class="menu-item" aria-haspopup="true" id="Home">
                        <a href="{{ url('/') }}" class="menu-link">
                            <i class="menu-icon flaticon-home"></i>
                            <span class="menu-text">Beranda</span>
                        </a>
                    </li>

                    <li class="menu-section">
                        <h4 class="menu-text">Main Menu</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li>

                    <li class="menu-item" aria-haspopup="true" id="Jadwalsantri">
                        <a href="{{ route('jadwal.santri') }}" class="menu-link">
                            <i class="menu-icon flaticon2-calendar-4"></i>
                            <span class="menu-text">Jadwal Kelas</span>
                        </a>
                    </li>

                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover" id="liNilai">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <i class="menu-icon flaticon2-list-3"></i>
                            <span class="menu-text">Hasil Pembelajaran</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li class="menu-item" aria-haspopup="true" id="Ulangansantri">
                                    <a href="{{ route('ulangan.santri') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nilai Ulangan</span>
                                    </a>
                                </li>

                                <li class="menu-item" aria-haspopup="true" id="Sikapsantri">
                                    <a href="{{ route('sikap.santri') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nilai Sikap</span>
                                    </a>
                                </li>

                                <li class="menu-item" aria-haspopup="true" id="Rapotsantri">
                                    <a href="{{ route('rapot.santri') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Nilai Rapot</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="menu-item has-treeview" id="Home">
                        <a href="{{ url('/') }}" class="menu-link">
                            <i class="menu-icon flaticon-home"></i>
                            <span class="menu-text">Beranda</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
