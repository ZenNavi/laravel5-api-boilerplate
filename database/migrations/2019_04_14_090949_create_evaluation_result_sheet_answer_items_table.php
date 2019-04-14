<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationResultSheetAnswerItemsTable extends Migration
{

    const TABLE_NAME = 'evaluation_result_sheet_answer_items';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(static::TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eval_id');
            $table->integer('eval_sheet_id');
            $table->integer('eval_sheet_question_id');
            $table->integer('eval_sheet_item_id');
            $table->integer('staff_id');
            $table->string('title', 50);
            $table->text('detail')->nullable();
            $table->integer('points');
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
