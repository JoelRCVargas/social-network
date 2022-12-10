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
        Schema::create('comments', function (Blueprint $table) {
            //'id_publication','id_user','description'
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('id_user');
            $table->string('description');
            $table->timestamps();

            $table->foreign('id_publication')->references('id')->on('publications');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
