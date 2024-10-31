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
        Schema::create('menuitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menus')->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('hasSubmenu')->default(false);
            $table->boolean('visibility')->default(true);
            $table->json('submenus')->nullable();
            // $table->boolean('hasSetting')->default(false);
            // $table->json('settings')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menuitems');
    }
};
