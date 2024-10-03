<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
    ];

    public function scopeSearch(Builder $query, $search)
    {
        return $query->where('nama', 'LIKE', "%$search%")
            ->orWhere('alamat', 'LIKE', "%$search")
            ->orWhere('no_telp', 'LIKE', "%$search");
    }
}
