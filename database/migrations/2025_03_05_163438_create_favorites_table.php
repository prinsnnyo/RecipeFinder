<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('recipe_id'); // Keep this if you still want to track recipe IDs
            $table->string('recipe_name'); // Add recipe name
            $table->string('recipe_image')->nullable(); // Add recipe image (nullable)
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Removed the foreign key constraint on `recipe_id`
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
