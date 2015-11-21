<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->string('month',2);
            $table->string('year',4);
            $table->bigInteger('beginning_balance')->default(0);
            $table->bigInteger('debit')->default(0);
            $table->bigInteger('credit')->default(0);
            $table->bigInteger('ending_balance')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('journal_histories');
    }
}
