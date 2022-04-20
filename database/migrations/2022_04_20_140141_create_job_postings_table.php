<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('requirement');
            $table->string('role');
            $table->string('employee_id'); 
            $table->string('start_date');
            $table->string('finish_date'); 
            $table->string('status');  // 0 - Applied, 1 - Contacted, 2 - Technical Interview done, 3 - Await response after Interview, 4 - Lst phase, 5 - Ready for employment, 6 - Hired, 7 - Not hired
            $table->string('cand_status'); //current status of the application for the candidate
            $table->boolean('is_deleted');
            $table->string('updated_by');
            $table->date('expected_salary'); 
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
        Schema::dropIfExists('job_postings');
    }
}
