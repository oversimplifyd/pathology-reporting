<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('purpose');
            $table->text('description');
            $table->integer('report_id')->unsigned();
            $table->date('received_at');
            $table->date('completed_at');
            $table->text('result');
            $table->timestamps();
        });

       /* Schema::table('tests', function($table)
        {
            $table->foreign('report_id')->references('user_id')
                ->on('reports')->onDelete('cascade');
        });*/

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tests');
    }
}
