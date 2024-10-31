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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('settingcategory_id')->constrained('settingcategories');
            $table->string('type');
            $table->string('name');
            $table->text('value')->nullable();
            // $table->json('option')->nullable();
            // $table->string('color')->nullable();
            // $table->boolean('boolean')->nullable();
            $table->timestamps();
            $table->unique(['settingcategory_id','name']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
