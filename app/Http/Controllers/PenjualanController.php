<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get("date") ?? date("Y-m-d");
        $penjualans = Penjualan::with('pelanggan')->where("petugas_id", "=", Auth::user()->id)->search($keyword)->latest('updated_at')->paginate(8)->withQueryString();
        return view('penjualan.index', compact('penjualans', 'keyword'));
    }

    public function init()
    {
        $result = Penjualan::create([
            'petugas_id' => Auth::user()->id,
        ]);
        return redirect()->route('penjualan.create', $result->id);
    }

    public function create(Request $request, Penjualan $penjualan)
    {
        $kode_produk = $request->kode_produk;
        $jumlah = $request->jumlah;
        $title = 'Hapus produk!';
        $text = "Apakah kamu yakin ingin menghapus produk tersebut";
        confirmDelete($title, $text);
        $produk = Produk::all();
        $pelanggan = Pelanggan::all();
        return view('penjualan.create', compact('produk', 'penjualan', 'pelanggan', 'kode_produk', 'jumlah'));
    }

    public function store(Request $request, Penjualan $penjualan)
    {
        $produk = Produk::where('kode_produk', '=', $request->kode_produk)->first();
        if ($produk && $penjualan->status !== 'selesai' && $produk->stok > 0) {
            if ($request->jumlah <= $produk->stok) {
                $jumlah = min($request->jumlah, $produk->stok);
                $stok = $produk->stok - $jumlah;
                $produk->update(['stok' => $stok]);
                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'kode_produk' => $request->kode_produk,
                    'nama_produk' => $produk->nama_produk,
                    'harga' => $produk->harga,
                    'jumlah' => $jumlah,
                ]);
                Alert::toast('Produk Berhasil Ditambahkan', 'success');
            } else {
                Alert::toast("Stok $produk->nama_produk sisa $produk->stok", 'error');
            }
        } else {
            if (!$produk) {
                Alert::toast("Produk Tidak Ditemukan", 'error');
            }
            if ($penjualan->status === 'selesai') {
                Alert::toast('Penjualan Telah Selesai Tidak Bisa Menambahkan Lagi', 'error');
            }
            if ($produk->stok === 0) {
                Alert::toast("Produk Telah Habis", 'error');
            }
        }
        return redirect()->route('penjualan.create', $penjualan->id);
    }

    public function updatePelanggan(Request $request, Penjualan $penjualan)
    {
        if ($penjualan->status === 'selesai') {
            Alert::toast('Penjualan Telah Selesai Tidak Bisa Mengubah Pelanggan Lagi', 'error');
        } else {
            $penjualan->update([
                'pelanggan_id' => $request->pelanggan,
            ]);
            Alert::toast('Pelanggan Berhasil Diubah', 'success');
        }
        return redirect()->route('penjualan.create', $penjualan->id);
    }

    public function destroy(DetailPenjualan $detail)
    {
        if ($detail->penjualan->status === 'selesai') {
            Alert::toast('Penjualan Telah Selesai Tidak Bisa Menghapus Lagi', 'error');
        } else {
            $produk = Produk::where('kode_produk', '=', $detail->kode_produk)->first();
            $stok = $produk->stok + $detail->jumlah;
            $produk->update(['stok' => $stok]);
            $detail->delete();
            Alert::toast('Produk Berhasil Dihapus', 'success');
        }
        return redirect()->route('penjualan.create', $detail->penjualan->id);
    }

    public function bayar(Request $request, Penjualan $penjualan)
    {
        if ($request->bayar < $request->total_harga) {
            Alert::toast('Uang Tidak Cukup', 'error');
        } else {
            $penjualan->update([
                'total_harga' => $request->total_harga,
                'bayar' => $request->bayar,
                'status' => 'selesai'
            ]);
            Alert::toast('Penjualan Selesai', 'success');
        }
        return redirect()->route('penjualan.create', $penjualan->id);
    }

    public function nota(Penjualan $penjualan)
    {
        return view('penjualan.nota', compact('penjualan'));
    }
}
