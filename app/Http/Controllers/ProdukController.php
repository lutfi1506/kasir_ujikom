<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $produks = Produk::search($keyword)->latest()->paginate(8);
        $title = 'Hapus produk!';
        $text = "Apakah kamu yakin ingin menghapus produk tersebut";
        confirmDelete($title, $text);
        return view('produk.index', compact('produks', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        Produk::create($request->all());
        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());
        Alert::toast('Data Berhasil Diubah', 'success');
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        Alert::toast('Produk Berhasil Dihapus', 'success');
        return redirect()->route('produk.index');
    }

    public function addStok()
    {
        return view('produk.addstok', [
            'produk' => Produk::all()
        ]);
    }

    public function updateStok(Request $request)
    {
        $produk = Produk::where('kode_produk', $request->kode_produk)->first();
        if ($produk) {
            $stok = $produk->stok + $request->tambah_stok;
            $produk->update([
                'stok' => $stok
            ]);
            Alert::toast('Stok Berhasil Ditambah', 'success');
        } else {
            Alert::toast('Produk Tidak Ada', 'error');
        }
        return redirect()->route('produk.index');
    }
}
