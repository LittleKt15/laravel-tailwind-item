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
            $table->string('item_name');
            $table->integer('category_id');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->text('description');
            $table->string('item_condition');
            $table->string('item_type');
            $table->boolean('status');
            $table->string('owner_name');
            $table->string('phone');
            $table->text('address');
            $table->string('latitude');
            $table->string('longitude');
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
