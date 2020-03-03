<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutiques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo',240)->nullable();
            $table->string('nomBoutique',200)->nullable();
            $table->string('nomProprietaire',200)->nullable();
            $table->text('description')->nullable();
            $table->string('numeroDeTelephone',20)->unique();
            $table->text('localisation')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
                  
            // $table->string('motDePasse',200);
            // $table->boolean('desactive')->default(false);
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
        Schema::dropIfExists('boutiques');
    }
}
