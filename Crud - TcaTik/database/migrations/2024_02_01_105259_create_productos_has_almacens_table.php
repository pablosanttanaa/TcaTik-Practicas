<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosHasAlmacensTable extends Migration
{
    public function up()
    {
        Schema::create('productos_has_almacens', function (Blueprint $table) {
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('almacen_id');
            
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_has_almacens');
    }
}
