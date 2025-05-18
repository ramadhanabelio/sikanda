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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->text('uraian');
            $table->string('pejabat_penanggung_jawab')->nullable();
            $table->date('waktu_pelaksanaan')->nullable();
            $table->decimal('volume', 15, 2);
            $table->string('satuan');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('jumlah_anggaran', 20, 2);
            $table->decimal('bobot', 10, 2);
            $table->decimal('volume_nominal_rr', 15, 2);
            $table->string('satuan_rr');
            $table->decimal('fisik_rr', 10, 2);
            $table->decimal('tertimbang_rr', 10, 2);
            $table->decimal('volume_nominal_rf', 15, 2);
            $table->string('satuan_rf');
            $table->decimal('fisik_rf', 10, 2);
            $table->decimal('tertimbang_rf', 10, 2);
            $table->decimal('rupiah_rk', 20, 2);
            $table->decimal('persentase_rk', 10, 2);
            $table->decimal('tertimbang_rk', 10, 2);
            $table->decimal('sisa_anggaran', 20, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
