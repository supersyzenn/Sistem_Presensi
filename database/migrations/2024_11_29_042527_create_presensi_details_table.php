<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('presensi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presensi_id')->constrained('presensis')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade'); // Ubah menjadi 'siswa'
            $table->enum('status', ['hadir', 'sakit', 'izin', 'alpa']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presensi_details');
    }
}
