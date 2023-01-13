<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('Cascade')
            ->onUpdate('cascade');
            $table->bigInteger('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('id')->on('prodis')
            ->onDelete('Cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen');
    }
}