@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Checklist Status</h1>
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
                  <label>Checklist Name <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('name', $getRecord->name) }}" name="name" placeholder="Checklist Status Name">
                </div>
                <div class="form-group">
                    <label>Status Color Name <span style="color: red">*</span></label>
                    <select class="form-control" name="status_color_id" id="">
                      @foreach ($getStatusColor as $value)
                      <option {{ ($value->id == $getRecord->status_color_id) ? 'selected' : '' }} value="{{ $value->id }}" style="background-color: {{ $value->code }}">{{ $value->name }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label>Status <span style="color: red">*</span></label>
                  <select class="form-control" name="status" required>
                    <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                    <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">InActive</option>
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
