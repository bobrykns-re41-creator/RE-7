<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vinyl_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vinyl_id')->constrained('vinyls')->cascadeOnDelete();
            $table->string('locale', 10)->index(); // 'en'
            $table->text('description'); // Перекладений текст

            // Гарантує, що не буде дублювання мов для однієї платівки
            $table->unique(['vinyl_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vinyl_translations');
    }
};
