<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration for categories table.
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migration for categories table.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
