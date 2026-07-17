<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->string('photo')->nullable();

            $table->decimal('price', 12, 2)->default(0);

            $table->integer('capacity')->default(1);

            $table->string('phone')->nullable();

            $table->enum('status', ['tersedia', 'tidak tersedia'])
                ->default('tersedia');

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('boats');
    }
};