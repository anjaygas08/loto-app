@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Color List</h1>
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
              <h3 class="card-title">Tag Color List</h3>
              <div class="col-sm-12" style="text-align: right;">
                <a href="{{ url('admin/color/tag_color/add') }}" class="btn btn-sm btn-primary">Add New Tag Color</a>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Color Name</th>
                    <th>Code</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecordTagColor as $key=>$value)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td class="text-center" style="background-color: {{ $value->code }};">{{ $value->name }}</td>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->created_by_name }}</td>
                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                      <a href="{{ url('admin/color/tag_color/edit/'.$value->id) }}" class="badge bg-secondary"><i class="fas fa-pen-square"></i></a>
                      <a href="{{ url('admin/color/tag_color/delete/'.$value->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
              {{-- <div style="padding: 3px 20px;">
                {{ $getRecord->links() }}
              </div> --}}
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Status Color List</h3>
              <div style="text-align: right;">
                <a href="{{ url('admin/color/status_color/add') }}" class="btn btn-sm btn-primary">Add New Status Color</a>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Color Name</th>
                    <th>Code</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecordStatusColor as $key=>$value)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td class="text-center" style="background-color: {{ $value->code }};">{{ $value->name }}</td>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->created_by_name }}</td>
                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                      <a href="{{ url('admin/color/status_color/edit/'.$value->id) }}" class="badge bg-secondary"><i class="fas fa-pen-square"></i></a>
                      <a href="{{ url('admin/color/status_color/delete/'.$value->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
              {{-- <div style="padding: 3px 20px;">
                {{ $getRecord->links() }}
              </div> --}}
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
