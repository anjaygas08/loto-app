@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Admin</h1>
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
                  <input type="text" class="form-control" required value="{{ old('name', $getRecord->name) }}" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label>Email <span style="color: red">*</span></label>
                  <input type="email" class="form-control" required value="{{ old('email', $getRecord->email) }}" name="email" placeholder="Enter Email">
                  <div style="color: red">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Password">
                  <p>Do you want to change password? So please add.</p>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required>
                    <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">InActive</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
