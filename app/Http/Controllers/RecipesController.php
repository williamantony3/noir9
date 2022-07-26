<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function show(){
        return view('recipes.show');
    }
    public function add(){
        return view('recipes.add');
    }
    public function store(Request $request){
    }
}
