<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            //'id_fanpage','title','description','image'
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->string('time');
            $table->timestamps();

            $table->unsignedBigInteger('id_fanpage');
            $table->foreign('id_fanpage')->references('id')->on('fanpages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
};
