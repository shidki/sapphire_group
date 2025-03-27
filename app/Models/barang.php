<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = "barangs";

    protected $fillable = [
        "nama_barang",
        "qty",
        "pemilik_id",
        "qic_id",
        "tanggal_pembelian",
        "tanggal_pencatatan",
    ];

    public function pemilik(){
        return $this->belongsTo(pemilik::class, "pemilik_id");
    }
    public function qic(){
        return $this->belongsTo(qic::class, "qic_id");
    }
}
