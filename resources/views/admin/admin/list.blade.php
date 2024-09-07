@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/admin/add') }}" class="btn btn-sm btn-primary">Add New Admin</a>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @include('admin.layouts._message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admin List</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Access Level</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $key=>$value)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->is_admin == 'admin' ? 'Admin' : ($value->is_admin == 'user1' ? 'User-HAR' : ($value->is_admin == 'user2' ? 'User-Operator' : 'User-K3L'))  }}</td>
                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                    <td>
                      <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="badge bg-secondary"><i class="fas fa-pen-square"></i></a>
                      <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('script')

@endsection
