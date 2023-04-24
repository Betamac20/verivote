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
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->string('id_number');
            $table->string('id_photo');
            $table->string('position');
            $table->string('name');
            $table->date('birthday');
            $table->string('placeofBirth');
            $table->string('gender');
            $table->string('year_level');
            $table->string('section');
            $table->string('department');
            $table->string('email');
            $table->string('last_grade');
            $table->LONGTEXT('essay_question');
            $table->string('first_semester_grade');
            $table->string('second_semester_grade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_forms');
    }
};
