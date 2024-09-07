@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Formulir Pengajuan Lock Out Tag Out (LOTO)</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="invoice p-3 mb-1">
            <div class="row">
              <div class="col-12">
                <h4>
                  <span><img src="{{ url('assets/dist/img/logo-plnip.png') }}" style="height: 2.1rem" alt="PLN IP Logo"></span>
                  <small class="float-right">No. Tagging : <strong>{{ old('tag_number', $getRecord->tag_number) }}</strong></small><br>
                  <small class="float-right">Status Tagging : <strong class="badge bg-warning">{{ old('status', $getRecord->status == 0 ) ? 'Request Permit' : 'Active' }}</strong></small>
                </h4><br>
                <h3 class="text-center">
                  <small>Formulir Pengajuan Lock Out Tag Out (LOTO)</small>
                </h3>
              </div>
            </div>
            <hr>
            <div class="row invoice-info">
              <div class="col-sm-6 invoice-col">
                <table>
                  <tbody>
                    <tr>
                      <td>Bidang</td>
                      <td> : </td>
                      <td><strong>{{ old('created_by', $getRecord->created_by) }}</strong></td>
                    </tr>
                    <tr>
                      <td>No. Work Order</td>
                      <td> : </td>
                      <td><strong>{{ old('wo_number', $getRecord->wo_number) }}</strong></td>
                    </tr>
                    <tr>
                      <td>Kegiatan Pemeliharaan</td>
                      <td> : </td>
                      <td><strong>{{ old('name', $getRecord->name) }}</strong></td>
                    </tr>
                    <tr>
                      <td>Uraian Pekerjaan</td>
                      <td> : </td>
                      <td><strong>{{ old('description', $getRecord->description) }}</strong></td>
                    </tr>
                    <tr>
                      <td>Lokasi</td>
                      <td>:</td>
                      <td><strong>{{ old('lokasi', $getRecord->lokasi) }}</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <hr>
            <h4 class="text-center"><small>List Peralatan Yang Diisolasi</small></h4>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Peralatan</th>
                      <th>No. Peralatan/KKS</th>
                      <th>Status Peralatan</th>
                      <th style="width: 0.5rem;">Tag Colour</th>
                      <th>Checklist Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($permitJoin as $key=>$value_permit)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $value_permit->peralatan }}</td>
                      <td>{{ $value_permit->no_peralatan }}</td>
                      <td>{{ $value_permit->status_peralatan }}</td>
                      <td>{{ $value_permit->tag_color }}</td>
                      <td>{{ $value_permit->checklist_status == 0 ? 'TAGGING' : 'RELEASE'}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="row">
              <div class="col-sm-6 table-responsive">
                <table class="table table-bordered">
                  <thead class="bg-secondary">
                    <tr>
                      <th>Bidang</th>
                      <th class="text-center">Submit Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach ($permitJoin as $key=>$value_permit) --}}
                    <tr>
                      <td>Operator</td>
                      <td class="text-center">
                        <div class="badge bg-warning">Waiting</div>
                      </td>
                    </tr>
                    <tr>
                      <td>K3</td>
                      <td class="text-center">
                        <div class="badge bg-warning">Waiting</div>
                      </td>
                    </tr>
                    {{-- @endforeach --}}
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            {{-- <hr>
            <div class="row no-print">
              <div class="col-12">
                <button type="button" class="btn btn-success float-right">Submit
                  LOTO Permit
                </button>
              </div>
            </div> --}}
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
</div>
</section>

</div>
@endsection

@section('script')

@endsection
