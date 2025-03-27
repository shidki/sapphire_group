<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string("nama_barang");
            $table->integer("qty");
            $table->foreignId("pemilik_id")->constrained()->onDelete("cascade");
            $table->foreignId("qic_id")->constrained()->onDelete("cascade");
            $table->date("tanggal_pembelian");
            $table->date("tanggal_pencatatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
