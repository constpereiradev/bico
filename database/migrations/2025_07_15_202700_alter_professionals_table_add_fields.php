<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('professionals', function (Blueprint $table) {
            if (!Schema::hasColumn('professionals', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('professionals', 'bio')) {
                $table->text('bio')->nullable();
            }
            if (!Schema::hasColumn('professionals', 'average_price')) {
                $table->decimal('average_price', 8, 2)->nullable();
            }
            if (!Schema::hasColumn('professionals', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('professionals', 'profile_picture')) {
                $table->string('profile_picture')->nullable();
            }
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('professionals', function (Blueprint $table) {
            //
        });
    }
};
