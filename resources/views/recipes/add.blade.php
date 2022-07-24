@extends('base')
@section('content')
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Add Recipe</h6>
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
          <form action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="clients_name" class="form-control-label">Client's Name</label>
              <input class="form-control" type="text" id="clients_name" name="clients_name" />
            </div>
            <div class="form-group">
              <label for="flavour" class="form-control-label">Flavour</label>
              <input class="form-control" type="text" id="flavour" name="flavour" />
            </div>
            <div class="form-group">
              <label for="nic_strength" class="form-control-label">Nic Strength (mg)</label>
              <input class="form-control" type="number" id="nic_strength" name="nic_strength" />
            </div>
            <div class="form-group">
              <label for="volume" class="form-control-label">Volume (ml)</label>
              <input class="form-control" type="number" id="volume" name="volume" />
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
                    <tr>
                      <td style='width: 15%;'>
                        <select name='name[]' class='form-control autoIngredients'>
                          <option value=''>Choose Name</option>
                        </select>
                      </td>
                      <td><input type='text' name='brand[]' class='form-control' placeholder='Brand'></td>
                      <td style='width: 15%;'>
                        <div class='input-group'>
                          <input type='number' name='percentage[]' class='form-control' step='0.1' value="0.0">
                          <div class='input-group-append'>
                            <span class='input-group-text'>%</span>
                          </div>
                        </div>
                      </td>
                      <td style='width: 10%;'>
                        <div class='input-group'>
                          <input type='number' name='qty[]' class='form-control quantityIngredients' placeholder='Qty (ml)' value="0">
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
                          <input type='number' name='price[]' class='form-control priceIngredients' placeholder='Price (/ml)' value="0">
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
                          <input type='number' name='' class='form-control subTotalIngredients' value='0' disabled>
                        </div>
                      </td>
                      <td><button type='button' class='btn btn-sm btn-secondary' id="add-row"><i class='fas fa-plus'></i></button></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5" class="text-right" style="padding: 10px;">Total</td>
                      <td>
                        <div class="input-group">
                          <div class='input-group-prepend'>
                            <span class='input-group-text'>Rp</span>
                          </div>
                          <input type='number' name='' class='form-control grandTotalIngredients' value='0' disabled>
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
                    <tr>
                      <td><input type='text' name='name_other_needs[]' class='form-control' placeholder='Name'></td>
                      <td><input type='number' name='qty_other_needs[]' class='form-control' placeholder='Qty'></td>
                      <td><input type='number' name='price_other_needs[]' class='form-control' placeholder='Price'></td>
                      <td><input type='number' name='' class='form-control' disabled></td>
                      <td><button type='button' class='btn btn-sm btn-secondary' id="add-row-other-needs"><i class='fas fa-plus'></i></button></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" class="text-right" style="padding: 10px;">Total</td>
                      <td><input type='number' name='' class='form-control' disabled></td>
                      <td></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="form-control-label">Client's Name</label>
              <select name="username" id="username" class="form-control usernameUser">
                <option value="">Pilih username</option>
              </select>
              <input type="text" name="username" class="form-control usernameAdmin" style="display: none;" disabled>
            </div>
            <div class="form-group">
              <label for="level" class="form-control-label">Level</label>
              <select name="level" id="level" class="form-control">
                <option value="0">User</option>
                <option value="1">Admin</option>
                <option value="2">Super</option>
              </select>
            </div>
            <div class="form-group">
              <label for="password" class="form-control-label">Password</label>
              <input class="form-control" type="password" id="password" name="password" />
            </div>
            <div class="form-group">
              <label for="status" class="form-control-label">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="0">Tidak Aktif</option>
                <option value="1" selected>Aktif</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" value="Simpan" class="btn btn-primary">
              <input type="reset" value="Batal" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection