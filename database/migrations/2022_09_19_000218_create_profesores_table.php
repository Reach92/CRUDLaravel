<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments("id");
            $table->timestamps();
            $table->string("name", 75);
            $table->string("correo",75);
            $table->string("ocupacion", 75);           
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::dropIfExists('profesores');
    }
}
