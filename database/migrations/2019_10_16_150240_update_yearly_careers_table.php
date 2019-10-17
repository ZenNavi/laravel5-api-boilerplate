<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateYearlyCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yearly_careers', function (Blueprint $table) {
            $table->addColumn('string', 'work_detail', ['after'=>'work_job', 'length'=>50]);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yearly_careers', function (Blueprint $table) {
            $table->dropColumn('work_detail');
            //
        });
    }
}
