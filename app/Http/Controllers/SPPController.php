<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\SPP;

class SPPController extends Controller
{
    public function index()
    {
        $spp = SPP::all();
        $santri = Santri::all();

        return view('spp.index', [
            'spp' => $spp,
            'santri' => $santri,
        ]);
    }
}
