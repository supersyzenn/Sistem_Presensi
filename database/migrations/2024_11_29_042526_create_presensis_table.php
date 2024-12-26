<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensisTable extends Migration
{
    public function up()
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade');  // Ubah menjadi 'jadwal'
            $table->date('tanggal');
            $table->integer('pertemuan');
            $table->text('materi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presensis');
    }
}
