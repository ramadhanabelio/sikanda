<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key (Auto Increment)
            $table->string('username')->unique(); // Username harus unik
            $table->string('email')->unique(); // Email harus unik
            $table->string('password'); // Menyimpan password yang sudah di-hash
            $table->timestamps(); // Kolom created_at & updated_at otomatis
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
