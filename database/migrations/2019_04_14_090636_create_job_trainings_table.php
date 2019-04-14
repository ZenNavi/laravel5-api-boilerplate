<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTrainingsTable extends Migration
{

    const TABLE_NAME = 'job_trainings';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->string('course_name', 30);
            $table->string('course_detail', 200)->nullable();
            $table->string('organization', 50)->nullable();
            $table->string('course_result', 50)->nullable();
            $table->string('attach_id', 30)->nullable();
            $table->date('issue_at')->nullable();
            $table->string('remark', 200)->nullable();

            $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(static::TABLE_NAME);
    }
}
