<?php

namespace App\Http\Controllers;

use App\Models\OtherNeeds;
use App\Models\RecipeDetails;
use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show(){
        $recipes = Recipes::all();
        return view('recipes.show', ['recipes' => $recipes]);
    }
    public function add(){
        return view('recipes.add');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'clients_name'=>'required',
            'flavour'=> 'required',
            'nic_strength'=> 'required|numeric',
            'volume'=> 'required|numeric',
            'cukai'=> 'required|numeric',
            'contingency_cost'=> 'required'
        ]);
        $recipe = Recipes::create($validatedData);
        $ingLength = count($request->name);
        for ($i=0; $i < $ingLength; $i++) { 
            $recipeDetails = new RecipeDetails();
            $recipeDetails->ingredient_id = $request->name[$i];
            $recipeDetails->recipe_id = $recipe->id;
            $recipeDetails->brand = $request->brand[$i];
            $recipeDetails->percentage = $request->percentage[$i];
            $recipeDetails->qty = $request->qty[$i];
            $recipeDetails->price = $request->price[$i];
            $recipeDetails->save();
        }
        $otherNeedsLength = count($request->name_other_needs);
        for ($i=0; $i < $otherNeedsLength; $i++) { 
            $otherNeeds = new OtherNeeds();
            $otherNeeds->name = $request->name_other_needs[$i];
            $otherNeeds->qty = $request->qty_other_needs[$i];
            $otherNeeds->price = $request->price_other_needs[$i];
            $otherNeeds->save();
        }
        return redirect()->route('showRecipes')->with('alert-success', 'Recipe successfully added');
    }
}
