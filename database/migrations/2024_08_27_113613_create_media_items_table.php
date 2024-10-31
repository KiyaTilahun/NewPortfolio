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
        Schema::create('media_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_type_id')->nullable()->constrained('media_types')->onDelete('cascade');
            $table->foreignId('media_category_id')->nullable()->constrained('media_categories')->onDelete('set null');
            $table->json('file_path')->nullable();
            $table->string('file_label')->nullable();
            $table->string('description')->nullable();
            $table->nullableMorphs('model'); // To handle polymorphic relationships
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_items');
    }
};
