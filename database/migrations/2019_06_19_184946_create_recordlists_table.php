<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userid');
            $table->string('image');
            $table->string('phno');
            $table->string('address');
            $table->string('timelength');
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
        Schema::dropIfExists('recordlists');
    }
}
