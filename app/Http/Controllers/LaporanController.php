<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $month = $request->month ?? date("Y-m");
        $month_detail = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $detail = DetailPenjualan::search($month)->get();
        return view("laporan.index", compact('detail', 'month', 'month_detail'));
    }
}
