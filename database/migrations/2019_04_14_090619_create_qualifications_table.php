<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{

    const TABLE_NAME = 'qualifications';

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
            $table->string('qualification_name', 30);
            $table->string('qualification_type', 20)->nullable();
            $table->string('qualification_grade', 20)->nullable();
            $table->string('issuing_authority', 50)->nullable();
            $table->string('attach_id', 36)->nullable();
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
