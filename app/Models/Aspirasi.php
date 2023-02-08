<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
