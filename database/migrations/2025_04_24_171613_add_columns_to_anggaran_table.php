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
        Schema::table('anggaran', function (Blueprint $table) {
            $table->decimal('bobot', 10, 2)->after('jumlah_anggaran');
            $table->decimal('volume_nominal_rr', 15, 2)->after('bobot');
            $table->string('satuan_rr')->after('volume_nominal_rr');
            $table->decimal('fisik_rr', 10, 2)->after('satuan_rr');
            $table->decimal('tertimbang_rr', 10, 2)->after('fisik_rr');
            $table->decimal('volume_nominal_rf', 15, 2)->after('tertimbang_rr');
            $table->string('satuan_rf')->after('volume_nominal_rf');
            $table->decimal('fisik_rf', 10, 2)->after('satuan_rf');
            $table->decimal('tertimbang_rf', 10, 2)->after('fisik_rf');
            $table->decimal('rupiah_rk', 20, 2)->after('tertimbang_rf');
            $table->decimal('persentase_rk', 10, 2)->after('rupiah_rk');
            $table->decimal('tertimbang_rk', 10, 2)->after('persentase_rk');
            $table->decimal('sisa_anggaran', 20, 2)->nullable()->after('tertimbang_rk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggaran', function (Blueprint $table) {
            $table->dropColumn([
                'bobot',
                'volume_nominal_rr',
                'satuan_rr',
                'fisik_rr',
                'tertimbang_rr',
                'volume_nominal_rf',
                'satuan_rf',
                'fisik_rf',
                'tertimbang_rf',
                'rupiah_rk',
                'persentase_rk',
                'tertimbang_rk',
                'sisa_anggaran'
            ]);
        });
    }
};
