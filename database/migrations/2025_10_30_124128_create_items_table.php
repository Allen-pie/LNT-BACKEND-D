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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('stock');
            $table->text('img_path');

            // $table->unsignedInteger('category_id'); 
            // $table->foreign('category_id')->references('id')->on('item_categories')->onUpdate('cascade')->onDelete('cascade');
            
            // defaultnya kehubung sama tabel categories
            $table->foreignId('category_id')->constrained('item_categories');

            // bakal bikin 2 kolom yaitu kolom created_at & updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
