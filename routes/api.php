<?php

use App\Http\Controllers\SantriController;
use App\Http\Controllers\References\CityController;
use App\Http\Controllers\References\DistrictController;
use App\Http\Controllers\References\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('city/province_code/{province_code}', CityController::class)->name('city.list.json');
Route::get('district/city_code/{city_code}', DistrictController::class)->name('districts.list.json');
Route::get('village/district_code/{district_code}', VillageController::class)->name('villages.list.json');

Route::get('santri/get-santri-jenis-kelamin', [SantriController::class, 'GetSantriJenisKelamin'])->name('api.santri.jenis-kelamin');
