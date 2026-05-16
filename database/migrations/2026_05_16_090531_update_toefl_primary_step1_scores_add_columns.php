<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('toefl_primarystep1_scores', function (Blueprint $table) {

            $table->string('email')->nullable();
            $table->string('gender')->nullable();

            $table->string('country_region_nationality')->nullable();

            $table->string('country_region_origin')->nullable();

            $table->string('native_language')->nullable();

            $table->date('date_of_birth')->nullable();

            $table->string('school_name')->nullable();

            $table->string('no_sertif')->nullable();

            $table->date('valid_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('toefl_primarystep1_scores', function (Blueprint $table) {

            $table->dropColumn([
                'email',
                'gender',
                'country_region_nationality',
                'country_region_origin',
                'native_language',
                'date_of_birth',
                'school_name',
                'no_sertif',
                'valid_date'
            ]);
        });
    }
};