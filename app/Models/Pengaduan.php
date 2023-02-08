<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class);
    }

    public function aspirasi()
    {
        return $this->hasMany(Aspirasi::class);
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('lokasi', 'like', '%' . $search . '%')->orWhere('keterangan', 'like', '%' . $search . '%');
        });
    }
}
