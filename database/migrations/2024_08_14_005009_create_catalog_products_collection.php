<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mongodb')->create('catalog_products', function (Blueprint $collection) {
            $collection->string('name');
            $collection->text('description')->nullable();
            $collection->decimal('height', 8, 2)->nullable();
            $collection->decimal('length', 8, 2)->nullable();
            $collection->decimal('width', 8, 2)->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('catalog_products');
    }
};
