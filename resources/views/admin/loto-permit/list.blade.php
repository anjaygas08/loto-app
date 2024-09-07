@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>LOTO List</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/loto-permit/add') }}" class="btn btn-sm btn-primary elevation-1">Form Pengajuan LOTO</a>
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
              <h3 class="card-title">LOTO List</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover table-nowrap">
                <thead>
                  <tr>
                    <th>No. Tagging</th>
                    <th>No. WO</th>
                    <th>Kegiatan Pemeliharaan</th>
                    <th>Lokasi</th>
                    <th>Bidang</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
                  <tr>
                    <td><a href="{{ url('admin/loto-permit/view/'.$value->id) }}" class="badge bg-info">{{ $value->tag_number }}</a></td>
                    <td>{{ $value->wo_number }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->lokasi }}</td>
                    <td>{{ $value->created_by }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td><a href="" class="badge bg-warning">{{ ($value->status == 0) ? 'Request Permit' : 'Active' }}</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                {{ $getRecord->links() }}
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
