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
            $table->uuid('_id');

            $table->primary('_id');
            $table->string('eval_id');
            $table->string('eval_sheet_id');
            $table->string('eval_sheet_question_id');
            $table->string('eval_sheet_item_id');
            $table->string('staff_id');
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
