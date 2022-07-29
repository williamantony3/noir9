@extends('base')
@section('content')
<!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Ingredients</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
                <a href="{{ route('addIngredients') }}" class="btn btn-sm btn-secondary">Add Ingredient</a>
            </div>
            <br>
            <br><br>
            <div class="col-lg-12 col-12">
              @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <div>{{Session::get('success')}}</div>
                </div>
            @endif
            @if(\Session::has('deletesuccess'))
            <div class="alert alert-success">
                <div>{{Session::get('deletesuccess')}}</div>
            </div>
        @endif
        @if(\Session::has('editsuccess'))
            <div class="alert alert-success">
                <div>{{Session::get('editsuccess')}}</div>
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
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr class="text-center">
                    <th>No</th>
                    <th>Ingredient's Name</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $rowNum = 1;
                    @endphp
                    @foreach ($ingredientsList as $ing)
                    <tr>
                    <td class="text-center">{{ $rowNum++ }} </td>
                    
                    <td class="text-left">{{ $ing['name'] }}</td>
                    <td class="text-right">{{ rupiah($ing['price']) }}</td>
                    <td class="text-center"><a href="{{ route('editIngredients', $ing) }}"><button type="button" class="btn btn-warning btn-sm">Edit</button></a> 
                      <a href="#"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Delete</button></a></td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Do you want to delete?
                          </div>
                          <div class="modal-footer">
                            <a href="{{ route('showIngredients') }}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button></a>
                            <a href="{{ route('deleteIngredients',$ing)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection