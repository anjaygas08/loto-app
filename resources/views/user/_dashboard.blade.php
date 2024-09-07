<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header border-transparent">
        <h3 class="card-title">Recent LOTO List</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
              <tr>
                <th>No. Tag</th>
                <th>No. WO</th>
                <th>Kegiatan Pemeliharaan</th>
                <th>Lokasi</th>
                <th>Bidang</th>
                <th>Tagging Date</th>
                <th>Release Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($getRecord as $value)
              <tr>
                <td><a href="{{ url('user/loto-permit/view/'.$value->id) }}" class="badge bg-info elevation-2">{{ $value->tag_number }}</a></td>
                <td>{{ $value->wo_number }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->lokasi }}</td>
                <td>{{ $value->created_by }}</td>
                <td>{{ ($value->created_at)->translatedFormat('l, d F Y') }}</td>
                <td>
                    @if ($value->status == 4)
                    {{ ($value->updated_at)->translatedFormat('l, d F Y') }}
                    @endif
                </td>
                <td><span class="badge bg-{{ $value->status_style }}">{{ $value->status == 1 ? 'Request Permit' : ($value->status == 2 ? 'Active' : ($value->status == 3 ? 'Request Release' : 'Finish')) }}</span></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <a href="{{ url('user/loto-permit/list') }}" class="btn btn-sm btn-secondary float-right">View All LOTO</a>
      </div>
      <!-- /.card-footer -->
    </div>
  </div>
</div>
