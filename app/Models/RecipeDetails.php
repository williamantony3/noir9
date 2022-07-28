<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeDetails extends Model
{
    use HasFactory;

    protected $table = 'recipe_details';

    public function ingredients(){
        return $this->belongsTo(Ingredients::class, 'ingredient_id', 'id');
    }
}
