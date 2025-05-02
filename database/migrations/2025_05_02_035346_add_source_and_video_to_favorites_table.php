<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('favorites', function (Blueprint $table) {
        $table->string('recipe_source')->nullable(); // For the recipe source URL
        $table->string('recipe_video')->nullable();  // For the recipe video URL
    });
}

public function down()
{
    Schema::table('favorites', function (Blueprint $table) {
        $table->dropColumn(['recipe_source', 'recipe_video']);
    });
}
};
