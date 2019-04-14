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
            $table->uuid('_id');

            $table->primary('_id');

            $table->string('name', 50)->nullable(false);
            $table->string('email', 200)->nullable(false)->unique();
            $table->string('pic_id');
            $table->string('dept_id');
            $table->string('grade_id');
            $table->string('address');
            $table->date('birth');
            $table->date('enter_at');
            $table->string('status', 20);
            $table->string('title', 50);

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
