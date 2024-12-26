<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tendiks', function (Blueprint $table) {
            $table->id();
            $table->string('nuptk')->unique();
            $table->string('nama_tendik');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status_kepegawaian', ['PNS', 'Non-PNS']);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tendiks');
    }

};
