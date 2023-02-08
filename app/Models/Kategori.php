<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['keterangan'];
    public function kategori()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
