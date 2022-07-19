<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredients;

class IngredientsController extends Controller
{
    public function show(){
        $ingredientsList = Ingredients::all();
        return view('ingredients.show',compact('ingredientsList'));
    }
    public function add(){
        return view('ingredients.add');
    }
    public function store(Request $request){
        $validatedData =$request->validate([
            'name'=>'required|max:60',
            'price'=> 'required|numeric'
        ]);
        Ingredients::create($validatedData);
        $request->session()->flash('success', 'Success adding ingredients');
        return redirect('/ingredients');
    }
}
