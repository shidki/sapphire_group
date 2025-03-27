<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qic extends Model
{
    use HasFactory;

    protected $table = "qics";

    protected $fillable = [
        "nama",
        "alamat"
    ];

    public function barangs(){
        return $this->hasMany(barang::class, "QIC_id");
    }
}
