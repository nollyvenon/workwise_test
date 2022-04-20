<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('linkedin');
            $table->string('github');
            $table->string('telegram');
            $table->string('facebook');
            $table->string('skype');
            $table->date('day_of_birth');
            $table->string('expected_salary');
            $table->string('photo_name');
            $table->string('skills');
            $table->string('current_position');
            $table->string('last_one_on_one_meeting_at');
            $table->string('last_performance_review_at');
            $table->string('next_performance_review_at');
            $table->string('notes');
            $table->string('status');
            $table->boolean('is_deleted');
            $table->boolean('signed_nda');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
