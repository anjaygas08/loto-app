@extends('user.layouts.app')
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
    <form action="" method="GET">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <button type="submit" class="btn info-box mb-3" name="search" value="1">
              <div class="info-box-icon bg-warning elevation-1">
                <i class="fas fa-hand-paper"></i>
              </div>
              <div class="info-box-content">
                <span class="info-box-text">
                  Request LOTO Permit
                </span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </button>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <button type="submit" class="btn info-box mb-3" name="search" value="2">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Active</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
            </button>
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <button type="submit" class="btn info-box mb-3" name="search" value="3">
              <span class="info-box-icon bg-info elevation-1 gap-0"><i class="fas fa-file-signature"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Request LOTO Release</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </button>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <button type="submit" class="btn info-box mb-3" name="search" value="4">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-lock-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Finish</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </button>
            <!-- /.info-box -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <button class="btn info-box mb-3 bg-gradient-warning" type="submit" name="search" value="HMU">
                  <span class="info-box-icon"><i class="fas fa-cogs"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">HMU</span>
                    <span class="info-box-number">1,500</span>
                  </div>
                </button>
              </div>

              <div class="col-md-4">
                <button class="btn info-box mb-3 bg-gradient-danger" type="submit" name="search" value="HKI">
                  <span class="info-box-icon"><i class="fas fa-microchip"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">HKI</span>
                    <span class="info-box-number">114,381</span>
                  </div>
                </button>
              </div>
              <div class="col-md-4">
                <button class="btn info-box mb-3 bg-gradient-info" type="submit" name="search" value="HL">
                  <span class="info-box-icon"><i class="fas fa-bolt"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">HL</span>
                    <span class="info-box-number">163,921</span>
                  </div>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-secondary btn-block elevation-2 mb-3" name="search" value="">View All LOTO</button>
              </div>
            </div>
            @include('user._dashboard')
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection
@section('script')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('assets/dist/js/pages/dashboard2.js') }}"></script>
@endsection
