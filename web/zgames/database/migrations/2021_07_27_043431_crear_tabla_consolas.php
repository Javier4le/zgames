<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaConsolas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Modelo orientado a objeto:
        //Base de datos relacional + programacion orientada a objeto
        // MySQL + Eloquent (ORM o Object Relational Mapping del modelo de laravel)
        //Crear clases pa que cree sola la tabla
        Schema::create('consolas', function (Blueprint $table) {
            $table->id(); //Secuencias,autoincrementales
            //Autoincrementales: Claves unicas generadas autmoaticamente por el motor
            $table->string("nombre",150);
            $table->string("marca",50);
            $table->integer("anio");
            $table->timestamps(); //Dos campos que son el create_at y el updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consolas');
    }
}
