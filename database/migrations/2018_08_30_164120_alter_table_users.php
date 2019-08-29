<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsers extends Migration
{
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
	        $table->integer('gatewayException1')->nullable();
	        $table->integer('gatewayException2')->nullable();
	        $table->integer('gatewayException3')->nullable();
        });
    }

    public function down()
    {
	    Schema::table('Users', function (Blueprint $table) {
		    $table->dropColumn(['gatewayException1', 'gatewayException2', 'gatewayException3']);
	    });
    }
}