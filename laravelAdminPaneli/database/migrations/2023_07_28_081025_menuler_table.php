<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MenulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuler', function (Blueprint $table) {
            $table->id();
            $table->string('menu_adi');
            $table->decimal('menu_fiyat', 8, 2);
            $table->text('menu_icerik')->nullable();
            $table->string('menu_foto')->nullable();
            $table->integer('kategori_id');
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
        Schema::dropIfExists('menuler');
    }
}
