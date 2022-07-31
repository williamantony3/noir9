<?php

namespace App\Http\Controllers;

use App\Models\OtherNeeds;
use App\Models\RecipeDetails;
use App\Models\Recipes;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show(){
        $recipes = Recipes::orderBy('id', 'DESC')->get();
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
            $otherNeeds->recipe_id = $recipe->id;
            $otherNeeds->save();
        }
        return redirect()->route('showRecipes')->with('alert-success', 'Recipe successfully added');
    }

    public function detail(Recipes $recipe){
        $recipe = Recipes::find($recipe->id);
        return view('recipes.detail', ['recipe' => $recipe]);
    }

    public function delete(Recipes $recipe){
        Recipes::destroy($recipe->id);
        OtherNeeds::where('recipe_id', $recipe->id)->delete();
        RecipeDetails::where('recipe_id', $recipe->id)->delete();
        return redirect()->route('showRecipes')->with('alert-success', 'Recipe successfully deleted');
    }

    public function edit(Recipes $recipe){
        $recipe = Recipes::find($recipe->id);
        return view('recipes.edit', ['recipe' => $recipe]);
    }
    
    public function update(Request $request, Recipes $recipe){
        $request->validate([
            'clients_name'=>'required',
            'flavour'=> 'required',
            'nic_strength'=> 'required|numeric',
            'volume'=> 'required|numeric',
            'cukai'=> 'required|numeric',
            'contingency_cost'=> 'required'
        ]);
        
        $recipeItem = Recipes::where('id', $recipe->id)->first();
        $recipeItem->clients_name = $request->clients_name;
        $recipeItem->flavour = $request->flavour;
        $recipeItem->nic_strength = $request->nic_strength;
        $recipeItem->volume = $request->volume;
        $recipeItem->cukai = $request->cukai;
        $recipeItem->contingency_cost = $request->contingency_cost;
        $recipeItem->save();

        RecipeDetails::where('recipe_id', $recipe->id)->delete();
        OtherNeeds::where('recipe_id', $recipe->id)->delete();

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
            $otherNeeds->recipe_id = $recipe->id;
            $otherNeeds->save();
        }
        return redirect()->route('showRecipes')->with('alert-success', 'Recipe successfully updated');
    }

    public function export(Recipes $recipe){
        $recipe = Recipes::where('id', $recipe->id)->first();
        $pdf = Pdf::loadView('recipes/export',compact('recipe'));
        $fileName = $recipe->clients_name . ' ' . $recipe->flavour . ' ' . $recipe->created_at . '.pdf';
    	return $pdf->download($fileName);
    }
}
