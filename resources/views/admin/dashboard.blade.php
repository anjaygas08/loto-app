@extends('admin.layouts.app')
@section('style')

@endsection
@section('content')
@include('admin.layouts._message')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col --> --}}
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hand-paper"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Request LOTO Permit</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Active</span>
              <span class="info-box-number">
                10
                <small>%</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-signature"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Request LOTO Release</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-lock-open"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Finish</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <div class="info-box mb-3 bg-gradient-warning">
                <span class="info-box-icon"><i class="fas fa-cogs"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">HMU</span>
                  <span class="info-box-number">5,200</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info-box mb-3 bg-gradient-danger">
                <span class="info-box-icon"><i class="fas fa-microchip"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">HKI</span>
                  <span class="info-box-number">114,381</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info-box mb-3 bg-gradient-info">
                <span class="info-box-icon"><i class="far fa-bolt"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">HL</span>
                  <span class="info-box-number">163,921</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">LOTO List</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead class="text-center">
                        <tr>
                          <th>No. Tag</th>
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
                          <td><a href="{{ url('admin/loto-permit/add/{tag_number}') }}" class="badge bg-info elevation-2">{{ $value->tag_number }}</a></td>
                          <td>{{ $value->wo_number }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->lokasi }}</td>
                          <td>{{ $value->created_by }}</td>
                          <td>{{ $value->created_at }}</td>
                          <td><a href="" type="button" class="badge bg-warning elevation-2">{{ ($value->status == 0) ? 'Request Permit' : 'Active' }}</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="{{ url('admin/loto-permit/list') }}" class="btn btn-sm btn-secondary float-right">View All LOTO</a>
                </div>
                <!-- /.card-footer -->
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('assets/dist/js/pages/dashboard2.js') }}"></script>
@endsection
