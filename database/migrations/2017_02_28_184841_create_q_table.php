<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('pid')->nullable();
            $table->integer('priority')->default(0);
            $table->string('status')->default('not complete');
            $table->string('execute_command');
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
        //
    }
}
