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
            $table->uuid('_id');

            $table->primary('_id');
            $table->string('staff_id');
            $table->string('course_name');
            $table->string('course_detail');
            $table->string('organization');
            $table->string('course_result');
            $table->string('attach_id');
            $table->string('issue_at');
            $table->string('remark');

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
