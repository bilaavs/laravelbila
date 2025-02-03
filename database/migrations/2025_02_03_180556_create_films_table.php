<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 45);
            $table->text('ringkasan')->nullable();
            $table->integer('tahun');
            $table->string('poster', 45)->nullable();
            $table->foreignId('genre_id')->constrained('genres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('films');
    }
};

