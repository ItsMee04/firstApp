<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 100);
            $table->string('nama', 100);
            $table->string('jeniskelamin', 100);
            $table->string('agama', 100);
            $table->string('tempat', 100);
            $table->date('tanggal');
            $table->unsignedBigInteger('jabatan_id');
            $table->string('kontak', 100);
            $table->text('alamat');
            $table->string('image', 100)->nullable();
            $table->integer('status')->unsigned()->nullable()->default(12);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
