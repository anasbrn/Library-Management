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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 20);
            $table->string('author');
            $table->bigInteger('isbn');
            $table->dateTime('date_pub');
            $table->integer('num_pages');
            $table->string('collection');
            $table->string('location');
            $table->string('status');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('gender_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
