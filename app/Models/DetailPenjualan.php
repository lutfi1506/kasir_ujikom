<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        "penjualan_id",
        "kode_produk",
        "nama_produk",
        "harga",
        "jumlah"
    ];


    public function scopeSearch(Builder $query, $keyword): void
    {
        $query->where('updated_at', 'like', "$keyword%");
    }

    public function penjualan(): BelongsTo
    {
        return $this->belongsTo(Penjualan::class);
    }
}
