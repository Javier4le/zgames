<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaJuegos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            //1. Definir los campos de la tabla juegos
            $table->string("nombre", 100);
            $table->string("descripcion", 200);
            $table->tinyInteger("apto_ninios")->default(0);//estos valores con flechas son modificadores
            $table->integer("precio")->unsigned();
            $table->date("fecha_lanzamiento");
            //2. Agregar la columna de la foranea
            //las claves primarias de laravel (id), son por defecto bigInteger y unsigned
            $table->bigInteger("consola_id")->unsigned();
            //3. Agregar la relación
            //ALTER TABLE ADD CONSTRAING FOREIGN KEY BLA BLA
            //nombre columna de la tabla que referenciamos la CF - a qué referencia - en qué tabla
            $table->foreign("consola_id")->references("id")->on("consolas")->onDelete("cascade");
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
        Schema::dropIfExists('juegos');
    }
}
