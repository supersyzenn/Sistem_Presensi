<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertemuansTable extends Migration
{
    public function up()
    {
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique(); // Nomor pertemuan harus unik
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pertemuans');
    }
}
