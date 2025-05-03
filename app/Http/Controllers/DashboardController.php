<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $before = date("Y-m", strtotime('-1 month'));
        $now = date("Y-m");
        $tahun = date("Y");
        // before
        $total_penjualan_before = Penjualan::where("updated_at", "like", "$before%")->sum('total_harga');
        $total_produk_before = DetailPenjualan::where("updated_at", "like", "$before%")->sum('jumlah');
        $jumlah_transaksi_before = Penjualan::where("updated_at", "like", "$before%")->count();


        // now
        $total_penjualan = Penjualan::where("updated_at", "like", "$now%")->sum('total_harga');
        $total_produk = DetailPenjualan::where("updated_at", "like", "$now%")->sum('jumlah');
        $jumlah_transaksi = Penjualan::where("updated_at", "like", "$now%")->count();

        $bulan = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        $grafik_penjualan = Penjualan::selectRaw("MONTH(updated_at) AS bulan, SUM(total_harga) AS total_harga")->where("updated_at", "like", "$tahun%")->groupBy('bulan')->orderBy('bulan')->get()->map(function ($item) use ($bulan) {
            return [
                'bulan' => $bulan[$item->bulan - 1],
                'total_harga' => $item->total_harga
            ];
        });



        $grafik_barang = Produk::selectRaw("SUM(stok) AS stok, nama_produk")->groupBy('nama_produk')->get();

        // persen
        $persen_penjualan = $total_penjualan_before != 0 ? round(($total_penjualan - $total_penjualan_before) / $total_penjualan_before * 100) : 0;
        $persen_produk = $total_produk_before != 0 ? round(($total_produk - $total_produk_before) / $total_produk_before * 100) : 0;
        $persen_jumlah_transaksi = $jumlah_transaksi_before != 0 ? round(($jumlah_transaksi - $jumlah_transaksi_before) / $jumlah_transaksi_before * 100) : 0;
        return view('dashboard.index', compact('total_penjualan', 'total_produk', 'grafik_penjualan', 'jumlah_transaksi', 'grafik_barang', 'persen_penjualan', 'persen_produk', 'persen_jumlah_transaksi'));
    }
}
