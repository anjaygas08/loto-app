@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Checklist Status List</h1>
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
              <h3 class="card-title">Checklist Status List</h3>
              <div style="text-align: right;">
                <a href="{{ url('admin/checklist/add') }}" class="btn btn-sm btn-primary">Add New Checklist Status</a>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Checklist Name</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $key=>$value)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td class="text-center" style="background-color: {{ $value->code }};">{{ $value->name }}</td>
                    <td>{{ $value->created_by_name }}</td>
                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>
                      <a href="{{ url('admin/checklist/edit/'.$value->id) }}" class="badge bg-secondary"><i class="fas fa-pen-square"></i></a>
                      <a href="{{ url('admin/checklist/delete/'.$value->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="padding: 10px 20px 5px;">
                {{ $getRecord->links() }}
            </div>
          </div>
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
