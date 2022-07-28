@extends('base')
@section('content')
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Detail Recipe</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
        </div>
        <br><br>
        <div class="col-lg-12 col-12">
          @if(\Session::has('alert'))
          <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
          </div>
          @endif
          @if(\Session::has('alert-success'))
          <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
          </div>
          @endif
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
        <div class="card-header">
          <h4 class="mb-0">Client's Information</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Client's Name</th>
                <th>Flavour</th>
                <th>Nic Strength</th>
                <th>Volume</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">{{ $recipe->clients_name }}</td>
                <td class="text-center">{{ $recipe->flavour }}</td>
                <td class="text-center">{{ $recipe->nic_strength }} mg</td>
                <td class="text-center">{{ $recipe->volume }} ml</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Ingredients</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Name</th>
                <th>Brand</th>
                <th>Percentage</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              @php $total = 0; @endphp
              @foreach($recipe->recipeDetails as $recipeDetail)
              <tr>
                <td class="text-center">{{ $recipeDetail->ingredients->name }}</td>
                <td class="text-center">{{ $recipeDetail->brand }}</td>
                <td class="text-right">{{ $recipeDetail->percentage }} %</td>
                <td class="text-right">{{ $recipeDetail->qty }} ml</td>
                <td class="text-right">{{ rupiah($recipeDetail->price) }} /ml</td>
                <td class="text-right">{{ rupiah($recipeDetail->qty * $recipeDetail->price) }}</td>
              </tr>
              @php $total += $recipeDetail->qty * $recipeDetail->price; @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr class="text-right">
                <td colspan="5"><b>TOTAL</b></td>
                <td><b>{{ rupiah($total) }}</b></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Other Needs</h4>
        </div>
        <div class="table-responsive">
          <table class="table table-flush">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              @php $otherNeedTotal = 0; @endphp
              @foreach($recipe->otherNeeds as $otherNeed)
              <tr>
                <td class="text-center">{{ $otherNeed->name }}</td>
                <td class="text-right">{{ $otherNeed->qty }}</td>
                <td class="text-right">{{ rupiah($otherNeed->price) }}</td>
                <td class="text-right">{{ rupiah($otherNeed->qty * $otherNeed->price) }}</td>
              </tr>
              @php $otherNeedTotal += $otherNeed->qty * $otherNeed->price; @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr class="text-right">
                <td colspan="3"><b>Cukai</b></td>
                <td><b>{{ rupiah($recipe->cukai) }}</b></td>
              </tr>
              @php $otherNeedTotal += $recipe->cukai; @endphp
              <tr class="text-right">
                <td colspan="3"><b>Contingency Cost ({{$recipe->contingency_cost}}%)</b></td>
                <td><b>{{ rupiah(ceil(($total + $otherNeedTotal) * $recipe->contingency_cost / 100)) }}</b></td>
              </tr>
              @php $otherNeedTotal += ceil(($total + $otherNeedTotal) * $recipe->contingency_cost / 100); @endphp
              <tr class="text-right">
                <td colspan="3"><b>TOTAL</b></td>
                <td><b>{{ rupiah($otherNeedTotal) }}</b></td>
              </tr>
              <tr class="text-right">
                <td colspan="3"><b>HPP TOTAL</b></td>
                <td><b>{{ rupiah($total + $otherNeedTotal) }}</b></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection