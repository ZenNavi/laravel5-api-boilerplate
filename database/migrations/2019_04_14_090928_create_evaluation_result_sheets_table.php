<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationResultSheetsTable extends Migration
{

    const TABLE_NAME = 'evaluation_result_sheets';

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
            $table->string('eval_id');
            $table->string('staff_id');
            $table->string('eval_sheet_id');
            $table->string('title');
            $table->text('detail');
            $table->string('points');

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
