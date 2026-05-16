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
        Schema::table('toefl_scores', function (Blueprint $table) {

            $table->string('email')->nullable()->after('class');

            $table->string('gender')->nullable()->after('email');

            $table->string('country_region_nationality')
                  ->nullable()
                  ->after('gender');

            $table->string('country_region_origin')
                  ->nullable()
                  ->after('country_region_nationality');

            $table->string('native_language')
                  ->nullable()
                  ->after('country_region_origin');

            $table->date('date_of_birth')
                  ->nullable()
                  ->after('native_language');

            $table->string('school_name')
                  ->nullable()
                  ->after('date_of_birth');

            $table->string('no_sertif')
                  ->nullable()
                  ->after('total_score');

            $table->date('valid_date')
                  ->nullable()
                  ->after('no_sertif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('toefl_scores', function (Blueprint $table) {

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