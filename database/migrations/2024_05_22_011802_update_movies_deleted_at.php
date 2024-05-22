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
        if(Schema::hasTable('movies') && !Schema::hasColumn('movies', 'deleted_at')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('movies') && Schema::hasColumn('movies', 'deleted_at')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->dropColumn('deleted_at');
            });
        }
    }
};
