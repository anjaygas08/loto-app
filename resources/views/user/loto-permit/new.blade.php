@extends('user.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Form Pengajuan LOTO</h1>
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
                  <div class="row">
                    <div class="col-md-6">
                      <label>No. Tagging</label>
                      <input type="text" class="form-control" value="{{ $newId }}" id="tag_number" name="tag_number" readonly>
                    </div>
                    <div class="col-md-6">
                      <label>Bidang</label>
                      <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="created_by" name="created_by" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block elevation-2">Create Permit</button>
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
