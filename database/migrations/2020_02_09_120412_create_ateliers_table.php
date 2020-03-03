<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAteliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ateliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo',240)->nullable();
            $table->string('nomAtelier',200)->nullable();
            $table->string('nomProprietaire',200)->nullable();
            $table->text('description')->nullable();
            $table->string('numeroDeTelephone',20)->unique();
            $table->text('localisation')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
                  
            // $table->string('email',200);
            // $table->string('motDePasse',200);
            // $table->integer('prestationId')->unsigned();
            // $table->foreign('prestationId')
            //       ->references('id')
            //       ->on('prestations')
            //       ->onDelete('cascade');
            $table->boolean('desactive')->default(false);
            $table->timestamps(); //gère la date de créa et celle de modif
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ateliers');
    }
}
