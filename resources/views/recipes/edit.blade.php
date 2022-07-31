@extends('base')
@section('content')
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Edit Recipe</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if(\Session::has('alert-success'))
          <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
          </div>
          @endif
          @if(\Session::has('alert'))
          <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
          </div>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{ route('updateRecipe', $recipe) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="clients_name" class="form-control-label">Client's Name</label>
              <input class="form-control" type="text" id="clients_name" name="clients_name" required value="{{ $recipe->clients_name }}" />
            </div>
            <div class="form-group">
              <label for="flavour" class="form-control-label">Flavour</label>
              <input class="form-control" type="text" id="flavour" name="flavour" required value="{{ $recipe->flavour }}" />
            </div>
            <div class="form-group">
              <label for="nic_strength" class="form-control-label">Nic Strength (mg)</label>
              <input class="form-control" type="number" id="nic_strength" name="nic_strength" required value="{{ $recipe->nic_strength }}" />
            </div>
            <div class="form-group">
              <label for="volume" class="form-control-label">Volume (ml)</label>
              <input class="form-control volume" type="number" id="volume" name="volume" required value="{{ $recipe->volume }}" />
            </div>
            <div class="form-group">
              <label for="contingency_cost" class="form-control-label">Contingency Cost (%)</label>
              <input class="form-control contingency_cost" type="number" id="contingency_cost" name="contingency_cost" step="0.1" required value="{{ $recipe->contingency_cost }}" />
            </div>
            <div class="row">
              <div class="col-7">
                <span class="form-control-label">Ingredients</span>
              </div>
              <div class="col-5 text-right">
                <!-- <button class="btn btn-sm btn-secondary" type="button" id="add-row">Add Row</button> -->
              </div>
            </div>
            <hr class="my-4">
            <div class="row my-4">
              <div class="col-12">
                <table style="width: 100%;">
                  <tbody id="dynamic-ingredients-field">
                    @php $grandTotalIngredients = 0; @endphp
                    @foreach($recipe->recipeDetails as $recipeDetail)
                    <tr>
                      <td style='width: 15%;'>
                        <select name='name[]' class='form-control autoIngredients' required>
                          <option value=''>Choose Name</option>
                          <option value='{{$recipeDetail->ingredient_id}}' selected>{{$recipeDetail->ingredients->name}}</option>
                        </select>
                      </td>
                      <td><input type='text' name='brand[]' class='form-control' placeholder='Brand' required value="{{$recipeDetail->brand}}"></td>
                      <td style='width: 15%;'>
                        <div class='input-group'>
                          <input type='number' name='percentage[]' class='form-control percentIngredients' step='0.1'  required value="{{$recipeDetail->percentage}}">
                          <div class='input-group-append'>
                            <span class='input-group-text'>%</span>
                          </div>
                        </div>
                      </td>
                      <td style='width: 10%;'>
                        <div class='input-group'>
                          <input type='number' name='qty[]' class='form-control quantityIngredients' placeholder='Qty (ml)' required value="{{$recipeDetail->qty}}">
                          <div class='input-group-append'>
                            <span class='input-group-text'>ml</span>
                          </div>
                        </div>
                      </td>
                      <td style='width: 20%;'>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='price[]' class='form-control priceIngredients' placeholder='Price (/ml)' required value="{{$recipeDetail->price}}">
                          <div class='input-group-append'>
                            <span class='input-group-text'>/ml</span>
                          </div>

                        </div>
                      </td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='' class='form-control subTotalIngredients' value='{{$recipe->volume * $recipeDetail->percentage / 100 * $recipeDetail->price}}' disabled>
                        </div>
                      </td>
                      @if($grandTotalIngredients == 0)
                      <td><button type='button' class='btn btn-sm btn-secondary' id="add-row"><i class='fas fa-plus'></i></button></td>
                      @else
                      <td><button type='button' class='btn btn-sm btn-danger remCF'><i class='fas fa-times'></i></button></td>
                      @endif
                    </tr>
                    @php $grandTotalIngredients += $recipe->volume * $recipeDetail->percentage / 100 * $recipeDetail->price; @endphp
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5" class="text-right" style="padding: 10px;">Total</td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='' class='form-control grandTotalIngredients' value='{{ $grandTotalIngredients }}' disabled>
                        </div>
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-7">
                <span class="form-control-label">Other Needs</span>
              </div>
              <div class="col-5 text-right">
                <!-- <button class="btn btn-sm btn-secondary" type="button" id="add-row">Add Row</button> -->
              </div>
            </div>
            <hr class="my-4">
            <div class="row my-4">
              <div class="col-12">
                <table style="width: 100%;">
                  <tbody id="dynamic-other-needs-field">
                    @php $grandTotalOtherNeeds = 0; @endphp
                    @foreach($recipe->otherNeeds as $otherNeed)
                    <tr>
                      <td><input type='text' name='name_other_needs[]' class='form-control' placeholder='Name' required value="{{ $otherNeed->name }}"></td>
                      <td><input type='number' name='qty_other_needs[]' class='form-control qtyOtherNeeds' placeholder='Qty' step="0.01" required value="{{ $otherNeed->qty }}"></td>
                      <td>
                        <div class='input-group'>
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='price_other_needs[]' class='form-control priceOtherNeeds' placeholder='Price' required value="{{ $otherNeed->price }}">
                        </div>
                      </td>
                      <td>
                        <div class='input-group'>
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='' class='form-control subTotalOtherNeeds' disabled value="{{ $otherNeed->qty * $otherNeed->price }}">
                        </div>
                      </td>
                      @if($grandTotalOtherNeeds == 0)
                      <td><button type='button' class='btn btn-sm btn-secondary' id="add-row-other-needs"><i class='fas fa-plus'></i></button></td>
                      @else
                      <td><button type='button' class='btn btn-sm btn-danger remCF-other-needs'><i class='fas fa-times'></i></button></td>
                      @endif
                    </tr>
                    @php $grandTotalOtherNeeds += $otherNeed->qty * $otherNeed->price; @endphp
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" class="text-right" style="padding: 10px;">Total</td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='' class='form-control grandTotalOtherNeeds' disabled value="{{ $grandTotalOtherNeeds }}">
                        </div>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3" class="text-right" style="padding: 10px;">Cukai</td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                        <input class="form-control cukai" type="number" id="cukai" name="cukai" required value="{{ $recipe->cukai }}" />
                        </div>
                      </td>
                      <td></td>
                    </tr>
                    @php $grandTotalOtherNeeds += $recipe->cukai; @endphp
                    <tr>
                      <td colspan="3" class="text-right" style="padding: 10px;">Contingency Cost</td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                        <input class="form-control calculated_cont_cost" type="number" id="calculated_cont_cost" name="calculated_cont_cost" disabled value="{{ ceil(($grandTotalIngredients + $grandTotalOtherNeeds) * $recipe->contingency_cost / 100) }}"/>
                        </div>
                      </td>
                      <td></td>
                    </tr>
                    @php $grandTotalOtherNeeds += ceil(($grandTotalIngredients + $grandTotalOtherNeeds) * $recipe->contingency_cost / 100); @endphp
                    <tr>
                      <td colspan="3" class="text-right" style="padding: 10px;">HPP Total</td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='' class='form-control hppTotal' disabled value="{{ $grandTotalIngredients + $grandTotalOtherNeeds }}">
                        </div>
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
                <table>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-6"></div>
              <div class="col-6 text-right">
                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                <input type="submit" value="Save" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection