@extends('user.layouts.app')
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
          @if (Str::length(Auth::user()) > 0)
          @if (Auth::user()->is_admin == "user1")

          <a href="{{ url('user/loto-permit/add') }}" class="btn btn-sm btn-primary elevation-1" name="form-pengajuan">Form Pengajuan LOTO</a>
          @endif
          @endif
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
                    <th>Tagging Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
                  <tr>
                    <td><a href="{{ url('user/loto-permit/view/'.$value->id) }}" class="badge bg-info">{{ $value->tag_number }}</a></td>
                    <td>{{ $value->wo_number }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->lokasi }}</td>
                    <td>{{ $value->created_by }}</td>
                    <td>{{ ($value->created_at)->translatedFormat('l, d F Y') }}</td>
                    <td>
                      <span href="" class="badge bg-{{ $value->status_style }}" name="sign-access">{{ $value->status == 1 ? 'Request Permit' : ($value->status == 2 ? 'Active' : ($value->status == 3 ? 'Request Release' : 'Finish')) }}</span>
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
<script type="text/javascript">
  var data = "yyyy-mm-dd hh:mm:ss";
  document.getElementById("date").valueAsDate = new Date(data);

</script>


@endsection
