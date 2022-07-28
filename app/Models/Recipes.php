<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function recipeDetails(){
        return $this->hasMany(RecipeDetails::class, 'recipe_id', 'id');
    }
    public function otherNeeds(){
        return $this->hasMany(OtherNeeds::class, 'recipe_id', 'id');
    }
}
