<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['kode_produk', 'nama_produk', 'harga', 'stok'];

    public function scopeSearch(Builder $query, $keyword): void
    {
        $query->where('nama_produk', 'like', "%$keyword%")
            ->orWhere("kode_produk", "like", "%$keyword%")
            ->orWhere("harga", "like", "%$keyword%")
            ->orWhere("stok", "like", "%$keyword%");
    }
}
