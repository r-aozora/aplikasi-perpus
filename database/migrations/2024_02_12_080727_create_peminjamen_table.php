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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')
                ->nullable()
                ->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->date('tgl_pinjam')
                ->nullable();
            $table->date('tgl_kembali')
                ->nullable();
            $table->date('tenggat')
                ->nullable();
            $table->enum('status', [0, 1, 2])
                ->nullable()
                ->default(0);
            $table->timestamps();
        });

        Schema::create('detail_pinjam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pinjam_id')->constrained('peminjaman');
            $table->foreignId('buku_id')->constrained('buku');
            $table->unsignedBigInteger('jumlah')
                ->nullable()
                ->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
        Schema::dropIfExists('detail_pinjam');
    }
};
