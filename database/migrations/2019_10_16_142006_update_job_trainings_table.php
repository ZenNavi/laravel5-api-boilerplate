<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateJobTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_trainings', function (Blueprint $table) {
            $table->addColumn('date', 'course_start_at', ['after'=>'course_detail']);
            $table->addColumn('date', 'course_end_at', ['after'=>'course_start_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_trainings', function (Blueprint $table) {
            $table->dropColumn('course_start_at');
            $table->dropColumn('course_end_at');
        });
    }
}
