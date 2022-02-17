<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RapotController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SPPController;
use App\Http\Controllers\UlanganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('', '/login', 302);

Auth::routes();
Route::controller(UserController::class)->group(function () {
    Route::get('login/cek_email/json', 'cek_email');
    Route::get('login/cek_password/json', 'cek_password');
    Route::post('cek-email', 'email')->name('cek-email');
    Route::get('reset/password/{id}', 'password')->name('reset.password');
    Route::patch('reset/password/update/{id}', 'update_password')->name('reset.password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('jadwal/sekarang', [JadwalController::class, 'jadwalSekarang']);

    Route::controller(UserController::class)->group(function () {
        Route::get('profile', 'profile')->name('profile');
        Route::get('pengaturan/profile', 'edit_profile')->name('pengaturan.profile');
        Route::post('pengaturan/ubah-profile', 'ubah_profile')->name('pengaturan.ubah-profile');
        Route::get('pengaturan/edit-foto', 'edit_foto')->name('pengaturan.edit-foto');
        Route::post('pengaturan/ubah-foto', 'ubah_foto')->name('pengaturan.ubah-foto');
        Route::get('pengaturan/email', 'edit_email')->name('pengaturan.email');
        Route::post('pengaturan/ubah-email', 'ubah_email')->name('pengaturan.ubah-email');
        Route::get('pengaturan/password', 'edit_password')->name('pengaturan.password');
        Route::post('pengaturan/ubah-password', 'ubah_password')->name('pengaturan.ubah-password');
    });

    Route::middleware(['santri'])->group(function () {
        Route::get('jadwal/santri', [JadwalController::class, 'santri'])->name('jadwal.santri');
        Route::get('ulangan/santri', [UlanganController::class, 'santri'])->name('ulangan.santri');
        Route::get('rapot/santri', [RapotController::class, 'santri'])->name('rapot.santri');
        Route::get('rapot/print', [RapotController::class, 'print'])->name('rapot.santri.print');

        Route::get('santri/spp', [SantriController::class, 'spp'])->name('spp.santri.index');
        Route::post('santri/spp/store', [SantriController::class, 'store_spp'])->name('spp.santri.store');
    });

    Route::middleware(['guru'])->group(function () {
        Route::controller(GuruController::class)->group(function () {
            Route::get('absen', 'absensi')->name('absensi.index');
            Route::post('absen/simpan', 'simpan')->name('absen.simpan');
        });

        Route::get('jadwal/guru', [JadwalController::class, 'guru'])->name('jadwal.guru');
        Route::get('rapot/predikat', [RapotController::class, 'predikat']);
        Route::get('rapot/mapel/{id}', [RapotController::class, 'showMapel'])->name('show.mapel');
        Route::get('ulangan/mapel/{id}', [UlanganController::class, 'showMapel'])->name('show.ulangan.mapel');

        Route::resources([
            'nilai' => NilaiController::class,
            'ulangan' => UlanganController::class,
            'rapot' => RapotController::class,
        ]);
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('admin/home', [HomeController::class, 'admin'])->name('admin.home');

        Route::controller(SettingController::class)->group(function () {
            Route::get('admin/setting', 'index')->name('setting.index');
            Route::patch('admin/setting/{setting}', 'update')->name('setting.update');
        });

        Route::controller(PengumumanController::class)->group(function () {
            Route::get('admin/pengumuman', 'index')->name('admin.pengumuman');
            Route::post('admin/pengumuman/simpan', 'simpan')->name('admin.pengumuman.simpan');
        });

        Route::controller(GuruController::class)->group(function () {
            Route::get('guru/kehadiran/{id}', 'kehadiran')->name('guru.kehadiran');
            Route::get('rekap-absensi', 'RekapAbsensi')->name('absensi.rekap');
            Route::get('data-rekap-absensi/{id}', 'RekapAbsensiShow')->name('absensi.rekap.show');
            Route::get('absen/json', 'json');
            Route::get('guru/mapel/{id}', 'mapel')->name('guru.mapel');
            Route::get('guru/ubah-foto/{id}', 'ubah_foto')->name('guru.ubah-foto');
            Route::post('guru/update-foto/{id}', 'update_foto')->name('guru.update-foto');
            Route::post('guru/upload', 'upload')->name('guru.upload');
            Route::get('guru/export_excel', 'export_excel')->name('guru.export_excel');
            Route::post('guru/import_excel', 'import_excel')->name('guru.import_excel');
            Route::delete('guru/deleteAll', 'deleteAll')->name('guru.deleteAll');
        });

        Route::controller(KelasController::class)->group(function () {
            Route::get('kelas/edit/json', 'getEdit');
        });

        Route::controller(SantriController::class)->group(function () {
            Route::get('santri/kelas/{id}', 'kelas')->name('santri.kelas');
            Route::get('santri/view/json', 'view');
            Route::get('listsantripdf/{id}', 'cetak_pdf');
            Route::get('santri/ubah-foto/{id}', 'ubah_foto')->name('santri.ubah-foto');
            Route::post('santri/update-foto/{id}', 'update_foto')->name('santri.update-foto');
            Route::post('santri/naik-kelas/{id}', 'naik_kelas')->name('santri.naik-kelas');
            Route::get('santri/export_excel', 'export_excel')->name('santri.export_excel');
            Route::post('santri/import_excel', 'import_excel')->name('santri.import_excel');
            Route::delete('santri/deleteAll', 'deleteAll')->name('santri.deleteAll');
        });

        Route::controller(MapelController::class)->group(function () {
            Route::get('mapel/getMapelJson', 'getMapelJson');
        });

        Route::controller(JadwalController::class)->group(function () {
            Route::get('jadwal/view/json', 'view');
            Route::get('jadwalkelaspdf/{id}', 'cetak_pdf');
            Route::get('jadwal/export_excel', 'export_excel')->name('jadwal.export_excel');
            Route::post('jadwal/import_excel', 'import_excel')->name('jadwal.import_excel');
            Route::delete('jadwal/deleteAll', 'deleteAll')->name('jadwal.deleteAll');
        });

        Route::controller(UlanganController::class)->group(function () {
            Route::get('ulangan-kelas', 'create')->name('ulangan-kelas');
            Route::get('ulangan-santri/{id}', 'edit')->name('ulangan-santri');
            Route::get('ulangan-show/{id}', 'ulangan')->name('ulangan-show');
        });

        Route::controller(RapotController::class)->group(function () {
            Route::get('rapot-kelas', 'create')->name('rapot-kelas');
            Route::get('rapot-santri/{id}', 'edit')->name('rapot-santri');
            Route::get('rapot-show/{id}', 'rapot')->name('rapot-show');
        });

        Route::get('predikat/{id}', [NilaiController::class, 'create'])->name('predikat');
        Route::get('deskripsi-predikat', [NilaiController::class, 'DeskripsiPredikat'])->name('deskripsi-predikat');

        Route::resources([
            'guru' => GuruController::class,
            'kelas' => KelasController::class,
            'santri' => SantriController::class,
            'mapel' => MapelController::class,
            'jadwal' => JadwalController::class,
            'spp' => SPPController::class,
            'mengajar' => MengajarController::class,
            'kelompok' => KelompokController::class,
            'data-pembayaran' => PembayaranController::class,
            'user' => UserController::class,
        ]);

        Route::controller(PembayaranController::class)->group(function () {
            Route::post('data-pembayaran/gagal/{id}', 'gagalPembayaran')->name('pembayaran.gagal');
            Route::post('data-pembayaran/berhasil/{id}', 'berhasilPembayaran')->name('pembayaran.berhasil');
        });
    });
});
