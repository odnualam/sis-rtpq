<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Belajar Santri | Sistem Informasi Santri Rumah Tahfidz Pejuang Quran</title>
    <style type="text/css">
        body {
            margin: 0 auto;
        }

        body,
        td,
        th {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 12px;
        }

        td,
        th {
            vertical-align: top;
        }

        th {
            text-align: center;
        }

        .font-normal th {
            font-weight: normal;
            vertical-align: middle;
        }

        .kop {
            border-spacing: 0;
            border-collapse: collapse;
        }

        .kop td {
            padding: 0;
            text-align: center;
        }

        .kop-univ td {
            font-size: 16px;
            line-height: 1.1;
        }

        .kop-fak td {
            font-size: 24px;
            font-weight: bold;
            line-height: 1.1;
        }

        .kop-prodi td {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.1;
            padding-bottom: 5px;
        }

        .header td,
        .header th {
            font-size: 16px;
        }

        .mid td,
        .mid th {
            font-size: 14px;
        }

        .center td,
        .center th {
            text-align: center;
            vertical-align: middle;
        }

        table.border {
            border-collapse: collapse;
        }

        table.border td,
        table.border th {
            border: 1px solid black;
        }

        tr.noborder td,
        tr.noborder th {
            border: none;
        }

        hr {
            margin: 10px auto;
            border: 1px solid black;
            border-width: 1px 0 0 0;
        }

        .text-center {
            text-align: center;
        }

        .btn-flat {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-width: 1px;
        }

        .btn.btn-primary {
            background-color: #0052A2;
            border-color: #008D4C;
        }

        .btn.btn-primary:hover,
        .btn.btn-primary:active,
        .btn.btn-primary.hover {
            background-color: #008D4C;
        }

        .bg-info {
            background-color: #D9EDF7;
        }

        .bg-success {
            background-color: #DFF0D8;
        }

        .title {
            font-size: 14px;
            font-weight: bold;
        }

        .padded th,
        .padded td {
            padding: 4px;
        }

        @media print {

            .col-md-1,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-md-10,
            .col-md-11,
            .col-md-12 {
                float: left;
            }

            .col-md-12 {
                width: 100%;
            }

            .col-md-11 {
                width: 91.66666666666666%;
            }

            .col-md-10 {
                width: 83.33333333333334%;
            }

            .col-md-9 {
                width: 75%;
            }

            .col-md-8 {
                width: 66.66666666666666%;
            }

            .col-md-7 {
                width: 58.333333333333336%;
            }

            .col-md-6 {
                width: 50%;
            }

            .col-md-5 {
                width: 41.66666666666667%;
            }

            .col-md-4 {
                width: 33.33333333333333%;
            }

            .col-md-3 {
                width: 25%;
            }

            .col-md-2 {
                width: 16.666666666666664%;
            }

            .col-md-1 {
                width: 8.333333333333332%;
            }
        }
    </style>
</head>

<body>
    <div align="center">
        <div style="width:800px">
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 15%;" align="center"><img src="https://pejuangquran.com/wp-content/uploads/2021/11/cropped-PQ-171x174.png" width="98" height="98" /></td>
                        <td align="center">
                            <p><strong style="font-size: 16pt;">LAPORAN HASIL BELAJAR SANTRI</strong></p>
                            <p>
                                <strong style="font-size: 12pt; text-transform: uppercase;">{{ $setting->nama_sekolah }}</strong><br />
                                <strong style="font-size: 9pt; text-transform: uppercase;">SEMESTER {{ __semester__(date('n')) }} TA {{ __tahun_ajaran__() }}</strong>
                            </p>
                        </td>
                        <td style="width: 15%;" align="center"><img src="https://3.bp.blogspot.com/-gqzr9g1HvNo/XWnEzqI15uI/AAAAAAAABsk/kXMVTK3wr4QZL24nlbuSGjSIDO4wPu0PwCK4BGAYYCw/s1600/logo%2Bgema%2Bmasjid.png" width="98" height="98" /></td>
                    </tr>
                </tbody>
            </table>
            <hr style="border: 0; border-top: 5px double #8c8c8c; margin-top: 0;" />
            <style>
                .tb_head td {
                    vertical-align: top;
                }

                .tb_data tr th {
                    text-align: center;
                    vertical-align: middle;
                }
            </style>
            <div class="watermark">
                <div align="center">
                    <table class="tb_head" width="100%">
                        <tr>
                            <td><strong>NAMA</strong></td>
                            <td> : </td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>NISN</strong></td>
                            <td> : </td>
                            <td>{{ Auth::user()->nisn }}</td>
                        </tr>
                        <tr>
                            <td><strong>KELAS</strong></td>
                            <td> : </td>
                            <td>{{ $kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <table class="tb_data border" border="1" width="100%">
                    <thead style="text-transform: uppercase;">
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Mata Pelajaran</th>
                            <th rowspan="2">KKM</th>
                            <th class="ctr" colspan="3">Pengetahuan</th>
                            <th class="ctr" colspan="3">Keterampilan</th>
                        </tr>
                        <tr>
                            <th class="ctr">Nilai</th>
                            <th class="ctr">Predikat</th>
                            <th class="ctr">Deskripsi</th>
                            <th class="ctr">Nilai</th>
                            <th class="ctr">Predikat</th>
                            <th class="ctr">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $val => $data)
                            @if ( $mapel->count() > 0 )
                                <tr>
                                    <?php $data = $data[0]; ?>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->mapel->nama_mapel }}</td>
                                    <td class="ctr">{{ $data->kkm($data->guru_id) }}</td>
                                    <td class="ctr">{{ isset($data->nilai($val)['p_nilai']) ? $data->nilai($val)['p_nilai'] : '-'  }}</td>
                                    <td class="ctr">{{ isset($data->nilai($val)['p_predikat']) ? $data->nilai($val)['p_predikat'] : '-'  }}</td>
                                    <td class="ctr">{{ isset($data->nilai($val)['p_deskripsi']) ? $data->nilai($val)['p_deskripsi'] : '-'  }}</td>
                                    <td class="ctr">{{ isset($data->nilai($val)['k_nilai']) ? $data->nilai($val)['k_nilai'] : '-'  }}</td>
                                    <td class="ctr">{{ isset($data->nilai($val)['k_predikat']) ? $data->nilai($val)['k_predikat'] : '-'  }}</td>
                                    <td class="ctr">{{ isset($data->nilai($val)['k_deskripsi']) ? $data->nilai($val)['k_deskripsi'] : '-'  }}</td>
                                </tr>
                            @else
                                <tr>

                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <br>
                <table class="tb_data border" border="1" width="100%">
                    <tbody>
                        <tr>
                            <td><strong>SAKIT</strong></td>
                            <td>{{ $absensi->absen_s }}</td>
                        </tr>
                        <tr>
                            <td><strong>IJIN</strong></td>
                            <td>{{ $absensi->absen_i }}</td>
                        </tr>
                        <tr>
                            <td><strong>ALPA</strong></td>
                            <td>{{ $absensi->absen_a }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table width="100%" class="footer-table">
                    <tr>
                        <td align="left" width="30%"></td>
                        <td align="left" width="40%"></td>
                        <td align="center" width="10%">&nbsp;</td>
                        <td align="left" width="20%">Jakarta, {{ date('j F Y') }}</td>
                    </tr>
                    <tr>
                        <td align="left"></td>
                        <td align="left"></td>
                        <td align="center">&nbsp;</td>
                        <td align="left">Kepala Sekolah</td>
                    </tr>

                    <tr>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="left">
                            <div style="width:3cm; height:1.5cm;"></div><br><u>{{ $setting->nama_kepala_sekolah }}</u>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="page-break-after:always"></div>
        </div>
    </div>
</body>
</html>
