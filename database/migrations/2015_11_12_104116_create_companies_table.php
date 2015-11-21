<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('address',100)->nullable();
            $table->string('telephone',20)->nullable();
            $table->string('email',50)->nullable();
            $table->string('npwp',50)->nullable();
            $table->string('month_period',2);
            $table->string('year_period',4);
            $table->string('information',100)->nullable();
            $table->integer('user_id')->unsigned();
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
        Schema::drop('companies');
    }
}
