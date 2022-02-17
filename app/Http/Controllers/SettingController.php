<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\CityService;
use App\Services\DistrictService;
use App\Services\ProvinceService;
use App\Services\VillageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class SettingController extends Controller
{
    public function index(Setting $setting, ProvinceService $provinceService, CityService $cityService, DistrictService $districtService, VillageService $villageService)
    {
        $setting = Setting::find(1);
        $provinces = $provinceService->getProvinceOrderByName();
        $city = City::where('code', '=', $setting->kabupaten_kota)->firstOrFail();
        $district = District::where('code', '=', $setting->kecamatan)->firstOrFail();
        $village = Village::where('code', '=', $setting->kelurahan)->firstOrFail();

        return view('admin.setting.index', [
            'setting' => $setting,
            'provinces' => $provinces,
            'city' => $city,
            'district' => $district,
            'village' => $village,
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        $input = $request->all();

        $input['npsn'] = $input['npsn'];
        $input['nama_sekolah'] = $input['nama_sekolah'];
        $input['nama_kepala_sekolah'] = $input['nama_kepala_sekolah'];
        $input['email'] = $input['email'];
        $input['no_telpon'] = $input['no_telpon'];
        $input['website'] = $input['website'];
        $input['status_sekolah'] = $input['status_sekolah'];
        $input['jenjang_pendidikan'] = $input['jenjang_pendidikan'];
        $input['waktu_penyelenggaraan'] = $input['waktu_penyelenggaraan'];
        $input['luas_tanah'] = $input['luas_tanah'];
        $input['akses_internet'] = $input['akses_internet'];
        $input['sumber_listrik'] = $input['sumber_listrik'];
        $input['alamat'] = $input['alamat'];
        $input['kode_pos'] = $input['kode_pos'];
        $input['kelurahan'] = $input['kelurahan'];
        $input['kecamatan'] = $input['kecamatan'];
        $input['kabupaten_kota'] = $input['kabupaten_kota'];
        $input['provinsi'] = $input['provinsi'];
        $input['jumlah_santri'] = $input['jumlah_santri'];
        $input['jumlah_guru'] = $input['jumlah_guru'];

        if ($request->has('logo')) {
            if (File::exists(public_path('uploads/setting/'.$input['logo']))) {
                File::delete(public_path('uploads/setting/'.$input['logo']));
            } else {
                $image = $request->file('logo');
                $name = date('d'.'m'.'Y').'_'.$image->getClientOriginalName();
                $image->move('uploads/setting/', $name);
                $input['logo'] = $name;
            }
        } else {
            unset($input['logo']);
        }

        $setting->update($input);

        return redirect()->back()->with('success', 'Berhasil diperbarui!');
    }
}
