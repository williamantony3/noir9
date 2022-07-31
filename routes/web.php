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
Route::get('/recipes/detail/{recipe}', [RecipesController::class, 'detail'])->name('detailRecipe');
Route::get('/recipes/delete/{recipe}', [RecipesController::class, 'delete'])->name('deleteRecipe');
Route::get('/recipes/edit/{recipe}', [RecipesController::class, 'edit'])->name('editRecipe');
Route::post('/recipes/update/{recipe}', [RecipesController::class, 'update'])->name('updateRecipe');
Route::get('/recipes/export/{recipe}', [RecipesController::class, 'export'])->name('exportRecipe');
Route::get('/ingredients',[IngredientsController::class,'show'])->name('showIngredients');
Route::get('/ingredients/add',[IngredientsController::class,'add'])->name('addIngredients');
Route::get('/ingredients/delete/{ing}',[IngredientsController::class,'destroy'])->name('deleteIngredients');
Route::get('/ingredients/{ing}/edit',[IngredientsController::class,'edit'])->name('editIngredients');
Route::post('/ingredients/updateIngredients/{ing}',[IngredientsController::class,'update'])->name('updateIngredients');
Route::post('/ingredients/addIngredients',[IngredientsController::class,'store'])->name('addIngredientsDetail');
Route::get('/ingredients/exportPdf',[IngredientsController::class,'exportPdf'])->name('exportPdf');
Route::post('/ingredients/autocompleteIngredients',[IngredientsController::class,'autocomplete'])->name('autocompleteIngredients');
Route::post('/ingredients/searchIngredients',[IngredientsController::class,'search'])->name('searchIngredients');
