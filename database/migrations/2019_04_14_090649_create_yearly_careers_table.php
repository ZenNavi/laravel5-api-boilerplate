<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlyCareersTable extends Migration
{

    const TABLE_NAME = 'yearly_careers';

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
            $table->string('work_year', 4);
            $table->string('work_department', 30);
            $table->string('work_job', 30)->nullable();
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
