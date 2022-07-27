<?php

use App\Http\Controllers\RecipesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RecipesController::class, 'show'])->name('showRecipes');
Route::get('/recipes/add', [RecipesController::class, 'add'])->name('addRecipes');
Route::post('/recipes/store', [RecipesController::class, 'store'])->name('storeRecipe');
Route::get('/ingredients',[IngredientsController::class,'show'])->name('showIngredients');
Route::get('/ingredients/add',[IngredientsController::class,'add'])->name('addIngredients');
Route::get('/ingredients/delete/{ing}',[IngredientsController::class,'destroy'])->name('deleteIngredients');
Route::get('/ingredients/{ing}/edit',[IngredientsController::class,'edit'])->name('editIngredients');
Route::post('/ingredients/updateIngredients/{ing}',[IngredientsController::class,'update'])->name('updateIngredients');
Route::post('/ingredients/addIngredients',[IngredientsController::class,'store'])->name('addIngredientsDetail');
Route::post('/ingredients/autocompleteIngredients',[IngredientsController::class,'autocomplete'])->name('autocompleteIngredients');
Route::post('/ingredients/searchIngredients',[IngredientsController::class,'search'])->name('searchIngredients');