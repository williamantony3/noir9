<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredients;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class IngredientsController extends Controller
{
    public function show(){
        $ingredientsList = Ingredients::orderBy('id', 'DESC')->get();
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
        $request->session()->flash('success', 'Success adding ingredient');
        return redirect('/ingredients');
    }

    public function edit(Ingredients $ing){
        return view('ingredients.update',['ing'=> $ing]);
    }

    public function update(Request $request, Ingredients $ing){
        $upIng = $ing;
        $validatedData =$request->validate([
            'name'=>'required|max:60',
            'price'=> 'required|numeric'
        ]);
        // dd($request->id, $upIng->id, $validatedData);
        Ingredients::where('id',$upIng->id)->update($validatedData);
        $request->session()->flash('editsuccess', 'Success edit ingredient');
        return redirect('/ingredients');
    }
    public function destroy(Ingredients $ing, Request $request){
        $delIng = $ing;
        $request->session()->flash('deletesuccess', 'Success deleting Ingredient');
        Ingredients::destroy($delIng->id);
        return redirect('/ingredients');
    }
    public function exportPdf(){
        $ingredientsList = Ingredients::all();
        $pdf = Pdf::loadView('ingredients/showpdf',compact('ingredientsList'));
        // )-;
        // return view('ingredients.showpdf',compact('ingredientsList'));
    	return $pdf->download('test.pdf');
    }
    public function autocomplete(){
        $ingredientsList = Ingredients::all();
        return response()->json(['ingredientsList' => $ingredientsList]);
    }
    public function search(Request $request){
        $ingredient = Ingredients::find($request->ingredientsId);
        return response()->json(['ingredient' => $ingredient]);
    }
}
