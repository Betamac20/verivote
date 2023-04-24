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
        Schema::create('vote_histories', function (Blueprint $table) {
            $table->id();
            $table->string('id_number');
            $table->string('name');
            $table->string('position');
            $table->string('candidate_name');
            $table->string('candidate_id_number');
            $table->string('election_id');
            $table->string('department');
            $table->string('candidate_role');
            $table->string('candidate_type');
            $table->string('partylist');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_histories');
    }
};
