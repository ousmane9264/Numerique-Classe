<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authentifications', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('date_nais')->nullable();
            $table->string('lieu_nais')->nullable();
            $table->integer('id_pay')->nullable();
            $table->integer('id_ville')->nullable();
            $table->string('situation')->nullable();
            $table->string('genre')->nullable();
            $table->string('profession')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('authentifications');
    }
}
