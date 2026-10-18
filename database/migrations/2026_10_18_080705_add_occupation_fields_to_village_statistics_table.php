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
        Schema::table('village_statistics', function (Blueprint $table) {
            // Data Pekerjaan/Mata Pencaharian
            $table->integer('pekerjaan_petani')->default(0)->after('pendidikan_s1');
            $table->integer('pekerjaan_nelayan')->default(0)->after('pekerjaan_petani');
            $table->integer('pekerjaan_pedagang')->default(0)->after('pekerjaan_nelayan');
            $table->integer('pekerjaan_pns')->default(0)->after('pekerjaan_pedagang');
            $table->integer('pekerjaan_guru')->default(0)->after('pekerjaan_pns');
            $table->integer('pekerjaan_wiraswasta')->default(0)->after('pekerjaan_guru');
            $table->integer('pekerjaan_buruh')->default(0)->after('pekerjaan_wiraswasta');
            $table->integer('pekerjaan_lainnya')->default(0)->after('pekerjaan_buruh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('village_statistics', function (Blueprint $table) {
            $table->dropColumn([
                'pekerjaan_petani',
                'pekerjaan_nelayan',
                'pekerjaan_pedagang',
                'pekerjaan_pns',
                'pekerjaan_guru',
                'pekerjaan_wiraswasta',
                'pekerjaan_buruh',
                'pekerjaan_lainnya',
            ]);
        });
    }
};
