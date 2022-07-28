@extends('base')
@section('content')
<!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Add Ingredients</h6>
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
              <form action="/ingredients/addIngredients" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="name" class="form-control-label">Ingredient's Name</label>
                  <input class="form-control @error('name') is-invalid              
                  @enderror" type="text" id="name" name="name"/>
                  @error('name')
                      <div class="invalid-feedback">
                           {{ $message }} 
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="price" class="form-control-label">Price</label>
                  <input class="form-control" type="number" id="price" name="price"/>
                </div>
                <div class="form-group float-right">
                  <a href="{{ route('showIngredients') }}"><input type="button" value="Cancel" class="btn btn-danger"></a>
                  <input type="submit" value="Save" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection