<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('sub_judul');
            $table->text('uraian');
            $table->decimal('koefisien', 10, 2);
            $table->string('satuan');
            $table->decimal('harga', 15, 2);
            $table->decimal('ppn', 15, 2);
            $table->decimal('jumlah', 15, 2)->virtualAs('(harga * koefisien) + ppn');
            $table->date('tanggal_anggaran'); // Tambahkan kolom tanggal_anggaran
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggaran');
    }
};
