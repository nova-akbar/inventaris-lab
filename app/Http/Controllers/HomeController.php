<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Barang;
use App\Models\MutasiBarang;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'lab' => Lab::all(),
            'totalBarang' => Barang::count(),
            'totalLab' => Lab::count(),
            'totalMutasi' => MutasiBarang::count(),
        ]);
    }
}
