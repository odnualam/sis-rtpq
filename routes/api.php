<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/city/province_code/{province_code}', 'References\CityController')->name('city.list.json');
Route::get('/district/city_code/{city_code}', 'References\DistrictController')->name('districts.list.json');
Route::get('/village/district_code/{district_code}', 'References\VillageController')->name('villages.list.json');
