<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{

    const TABLE_NAME = 'staff';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('email', 200)->unique();
            $table->string('pic_id', 36)->nullable();
            $table->string('dept_id', 20);
            $table->string('grade_id', 20)->nullable();
            $table->string('address', 200)->nullable();
            $table->date('birth')->nullable();
            $table->date('enter_at')->nullable();
            $table->string('status', 20);
            $table->string('title', 50)->nullable();
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
