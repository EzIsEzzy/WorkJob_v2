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
        Schema::table('job_applications', function (Blueprint $table) {
            //
            $table->longText('skills')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('education')->nullable();
            $table->longText('uploaded_cv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            //
            $table->dropColumn('skills');
            $table->dropColumn('experience');
            $table->dropColumn('education');
            $table->dropColumn('uploaded_cv');
        });
    }
};
