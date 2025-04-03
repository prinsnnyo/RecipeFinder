<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'recipe_id', 'recipe_name', 'recipe_image'];

    // Optional: Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
