<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama_barang',
        'satuan',
        'stok_awal',
        'stok_akhir',
        'created_by',
    ];

    public function histories(): HasMany
    {
        return $this->hasMany(ItemHistory::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getPenambahanAttribute()
    {
        return $this->histories()->where('type', 'penambahan')->sum('jumlah');
    }

    public function getPenguranganAttribute()
    {
        return $this->histories()->where('type', 'pengurangan')->sum('jumlah');
    }
}
