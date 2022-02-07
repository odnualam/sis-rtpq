<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login', 302);

Auth::routes();
Route::get('/login/cek_email/json', 'UserController@cek_email');
Route::get('/login/cek_password/json', 'UserController@cek_password');
Route::post('/cek-email', 'UserController@email')->name('cek-email')->middleware('guest');
Route::get('/reset/password/{id}', 'UserController@password')->name('reset.password')->middleware('guest');
Route::patch('/reset/password/update/{id}', 'UserController@update_password')->name('reset.password.update')->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/jadwal/sekarang', 'JadwalController@jadwalSekarang');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/pengaturan/profile', 'UserController@edit_profile')->name('pengaturan.profile');
    Route::post('/pengaturan/ubah-profile', 'UserController@ubah_profile')->name('pengaturan.ubah-profile');
    Route::get('/pengaturan/edit-foto', 'UserController@edit_foto')->name('pengaturan.edit-foto');
    Route::post('/pengaturan/ubah-foto', 'UserController@ubah_foto')->name('pengaturan.ubah-foto');
    Route::get('/pengaturan/email', 'UserController@edit_email')->name('pengaturan.email');
    Route::post('/pengaturan/ubah-email', 'UserController@ubah_email')->name('pengaturan.ubah-email');
    Route::get('/pengaturan/password', 'UserController@edit_password')->name('pengaturan.password');
    Route::post('/pengaturan/ubah-password', 'UserController@ubah_password')->name('pengaturan.ubah-password');

    Route::middleware(['santri'])->group(function () {
        Route::get('/jadwal/santri', 'JadwalController@santri')->name('jadwal.santri');
        Route::get('/ulangan/santri', 'UlanganController@santri')->name('ulangan.santri');
        Route::get('/sikap/santri', 'SikapController@santri')->name('sikap.santri');
        Route::get('/rapot/santri', 'RapotController@santri')->name('rapot.santri');

        Route::get('santri/spp','SantriController@spp')->name('spp.santri.index');
        Route::post('santri/spp/store','SantriController@store_spp')->name('spp.santri.store');
    });

    Route::middleware(['guru'])->group(function () {
        Route::get('/absen', 'GuruController@absensi')->name('absensi.index');
        Route::get('/absen/{id}', 'GuruController@absensiShow')->name('absensi.show');
        Route::post('/absen/simpan', 'GuruController@simpan')->name('absen.simpan');
        Route::get('/jadwal/guru', 'JadwalController@guru')->name('jadwal.guru');
        Route::resource('/nilai', 'NilaiController');
        Route::resource('/ulangan', 'UlanganController');
        Route::resource('/sikap', 'SikapController');
        Route::get('/rapot/predikat', 'RapotController@predikat');
        Route::resource('/rapot', 'RapotController');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/setting', 'SettingController@index')->name('setting.index');
        Route::patch('/admin/setting/{setting}', 'SettingController@update')->name('setting.update');
        Route::get('/admin/home', 'HomeController@admin')->name('admin.home');
        Route::get('/admin/pengumuman', 'PengumumanController@index')->name('admin.pengumuman');
        Route::post('/admin/pengumuman/simpan', 'PengumumanController@simpan')->name('admin.pengumuman.simpan');
        Route::get('/guru/kehadiran/{id}', 'GuruController@kehadiran')->name('guru.kehadiran');
        Route::get('/absen/json', 'GuruController@json');
        Route::get('/guru/mapel/{id}', 'GuruController@mapel')->name('guru.mapel');
        Route::get('/guru/ubah-foto/{id}', 'GuruController@ubah_foto')->name('guru.ubah-foto');
        Route::post('/guru/update-foto/{id}', 'GuruController@update_foto')->name('guru.update-foto');
        Route::post('/guru/upload', 'GuruController@upload')->name('guru.upload');
        Route::get('/guru/export_excel', 'GuruController@export_excel')->name('guru.export_excel');
        Route::post('/guru/import_excel', 'GuruController@import_excel')->name('guru.import_excel');
        Route::delete('/guru/deleteAll', 'GuruController@deleteAll')->name('guru.deleteAll');
        Route::resource('/guru', 'GuruController');
        Route::get('/kelas/edit/json', 'KelasController@getEdit');
        Route::resource('/kelas', 'KelasController');
        Route::get('/santri/kelas/{id}', 'santriController@kelas')->name('santri.kelas');
        Route::get('/santri/view/json', 'santriController@view');
        Route::get('/listsantripdf/{id}', 'santriController@cetak_pdf');
        Route::get('/santri/ubah-foto/{id}', 'santriController@ubah_foto')->name('santri.ubah-foto');
        Route::post('/santri/update-foto/{id}', 'santriController@update_foto')->name('santri.update-foto');
        Route::post('/santri/naik-kelas/{id}', 'santriController@naik_kelas')->name('santri.naik-kelas');
        Route::get('/santri/export_excel', 'santriController@export_excel')->name('santri.export_excel');
        Route::post('/santri/import_excel', 'santriController@import_excel')->name('santri.import_excel');
        Route::delete('/santri/deleteAll', 'santriController@deleteAll')->name('santri.deleteAll');
        Route::resource('/santri', 'santriController');
        Route::get('/mapel/getMapelJson', 'MapelController@getMapelJson');
        Route::resource('/mapel', 'MapelController');
        Route::resource('/kelompok', 'KelompokController');
        Route::get('/jadwal/view/json', 'JadwalController@view');
        Route::get('/jadwalkelaspdf/{id}', 'JadwalController@cetak_pdf');
        Route::get('/jadwal/export_excel', 'JadwalController@export_excel')->name('jadwal.export_excel');
        Route::post('/jadwal/import_excel', 'JadwalController@import_excel')->name('jadwal.import_excel');
        Route::delete('/jadwal/deleteAll', 'JadwalController@deleteAll')->name('jadwal.deleteAll');
        Route::resource('/jadwal', 'JadwalController');
        Route::resource('/mengajar', 'MengajarController');
        Route::get('/ulangan-kelas', 'UlanganController@create')->name('ulangan-kelas');
        Route::get('/ulangan-santri/{id}', 'UlanganController@edit')->name('ulangan-santri');
        Route::get('/ulangan-show/{id}', 'UlanganController@ulangan')->name('ulangan-show');
        Route::get('/sikap-kelas', 'SikapController@create')->name('sikap-kelas');
        Route::get('/sikap-santri/{id}', 'SikapController@edit')->name('sikap-santri');
        Route::get('/sikap-show/{id}', 'SikapController@sikap')->name('sikap-show');
        Route::get('/rapot-kelas', 'RapotController@create')->name('rapot-kelas');
        Route::get('/rapot-santri/{id}', 'RapotController@edit')->name('rapot-santri');
        Route::get('/rapot-show/{id}', 'RapotController@rapot')->name('rapot-show');
        Route::get('/predikat', 'NilaiController@create')->name('predikat');
        Route::resource('/spp', 'SPPController');
        Route::resource('/user', 'UserController');
        Route::resource('/data-pembayaran', 'PembayaranController');
    });
});
