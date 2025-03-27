<?php

namespace Database\Seeders;

use App\Models\pemilik;
use App\Models\qic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class seedAwal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pemilik::create([
            "nama" => "pemilik 1",
            "alamat" => "tempest"
        ]);
        qic::create([
            "nama" => "Qic 1",
            "alamat" => "tempest"
        ]);
    }
}
