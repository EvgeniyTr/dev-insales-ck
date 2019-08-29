<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insalesId')->nullable();;
            $table->string('pass')->nullable();
            $table->string('lang')->nullable();
            $table->string('urlShop')->nullable();
            $table->string('inn')->nullable();
            $table->string('taxationSystem')->nullable();
            $table->string('nds')->nullable();

            $table->string('apiSecret')->nullable();
	        $table->string('publicId')->nullable();
	        $table->integer('fieldIncomeId')->nullable();
	        $table->integer('fieldIncomeReturnId')->nullable();
	        $table->integer('onUpdateWebhookId')->nullable();
	        $table->integer('widgetId')->nullable();
	        $table->string('fieldStatusId')->nullable();
	        $table->boolean('firstTimeSetup')->nullable();
            $table->softDeletes();
	        $table->rememberToken();
	        $table->timestamps();
        });
    }

    public function down()
    {
        if (Schema::hasTable('Users')) {
            Schema::drop('Users');
        } 
    }
}