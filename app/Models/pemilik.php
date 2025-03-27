<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    use HasFactory;

    protected $table = "pemiliks";

    protected $fillable = [
        "nama",
        "alamat"
    ];

    public function barangs(){
        return $this->hasMany(barang::class, "pemilik_id");
    }
}
