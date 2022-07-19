@extends('base')
@section('content')
<!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Tambah User</h6>
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
                  <label for="level" class="form-control-label">Level</label>
                  <select name="level" id="level" class="form-control">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                    <option value="2">Super</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="username" class="form-control-label">Username</label>
                  <select name="username" id="username" class="form-control usernameUser">
                    <option value="">Pilih username</option>
                  </select>
                  <input type="text" name="username" class="form-control usernameAdmin" style="display: none;" disabled>
                </div>
                <div class="form-group">
                  <label for="name" class="form-control-label">Nama</label>
                  <input class="form-control" type="text" id="name" name="name"/>
                </div>
                <div class="form-group">
                  <label for="password" class="form-control-label">Password</label>
                  <input class="form-control" type="password" id="password" name="password"/>
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