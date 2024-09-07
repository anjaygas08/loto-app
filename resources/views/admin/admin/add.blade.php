@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Add New Admin</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form action="" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Name <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('name') }}" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label>Email <span style="color: red">*</span></label>
                  <input type="email" class="form-control" required value="{{ old('email') }}" name="email" placeholder="Enter Email">
                  <div style="color: red">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" required name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required>
                    <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                    <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">InActive</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Access Level</label>
                    <select class="form-control" name="is_admin" required>
                      <option {{ (old('is_admin') == 'admin') ? 'selected' : '' }} value="admin">Admin</option>
                      <option {{ (old('is_admin') == 'user1') ? 'selected' : '' }} value="user1">HAR</option>
                      <option {{ (old('is_admin') == 'user2') ? 'selected' : '' }} value="user2">Operator</option>
                      <option {{ (old('is_admin') == 'user3') ? 'selected' : '' }} value="user3">K3L</option>
                    </select>
                  </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@endsection

@section('script')

@endsection
