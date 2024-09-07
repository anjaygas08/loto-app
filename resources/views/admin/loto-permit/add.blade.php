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
                <div class="form-group">
                  <label>No. Work Order</label>
                  <input type="text" class="form-control" value="{{ old('wo_number') }}" id="wo_number" name="wo_number" placeholder="No. Work Order">
                </div>
                <div class="form-group">
                  <label>Kegiatan Pemeliharaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('name') }}" name="name" placeholder="Nama Kegiatan Pemeliharaan">
                </div>
                <div class="form-group">
                  <label>Uraian Pekerjaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('description') }}" name="description" placeholder="Uraian Pekerjaan">
                </div>
                <div class="form-group">
                  <label>Lokasi Pekerjaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('lokasi') }}" name="lokasi" placeholder="Lokasi Pekerjaan">
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Ijin Lock Out Tag Out (LOTO)</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Tanggal Pelaksanaan:</label>
                          <div class="input-group">
                            <input class="form-control" id="created_at" required="required" name="created_at" type="date">
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Daftar Peralatan Diisolasi</h3>
                      </div>
                      <div class="card-body p-0">
                        <table class="table table-bordered">
                          <thead class="text-center align-middle justify-center">
                            <tr>
                              <th>Nama Peralatan</th>
                              <th>No. Peralatan/KKS</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="AppendMore">
                            <tr>
                              <td><input class="form-control" id="peralatan" name="peralatan" type="text" placeholder="Nama Peralatan"></td>
                              <td><input class="form-control" id="no_peralatan" name="no_peralatan" type="text" placeholder="No. KKS"></td>
                              <td>
                                <select class="form-control" name="status_peralatan">
                                  <option selected>-</option>
                                  <option>RACK IN</option>
                                  <option>RACK OUT</option>
                                  <option>OPEN</option>
                                  <option>CLOSE</option>
                                </select>
                              </td>
                              <td class="text-center align-middle justify-center">
                                <div type="button" class="badge bg-primary AddMore">Add</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label>Catatan Khusus Oleh Pelaksana Pekerjaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control editor" value="{{ old('catatan') }}" name="catatan" placeholder="Catatan Khusus">
                </div>
                {{-- <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required disabled>
                    <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Finish</option>
                </select>
              </div> --}}
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tagging Request</button>
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
<script src="{{ url('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
  $('.editor').summernote({
    height: 200
  });

  var i = 1000;
  $('body').delegate('.AddMore', 'click', function() {
    var html = '<tr id="DeleteItem' + i + '">\n\
                    <td>\n\
                        <input class="form-control" id="peralatan" name="peralatan" type="text" placeholder="Nama Peralatan">\n\
                    </td>\n\
                    <td>\n\
                        <input class="form-control" id="no_peralatan" name="no_peralatan" type="text" placeholder="No. KKS">\n\
                    </td>\n\
                    <td>\n\
                        <select class="form-control" name="status_peralatan">\n\
                            <option selected>-</option>\n\
                            <option>RACK IN</option>\n\
                            <option>RACK OUT</option>\n\
                            <option>OPEN</option>\n\
                            <option>CLOSE</option>\n\
                        </select>\n\
                    </td>\n\
                    <td class="text-center align-middle justify-center">\n\
                        <div type="button" id="' + i + '" class="badge bg-danger DeleteItem"><i class="fas fa-minus"></i></div>\n\
                    </td>\n\
                    </tr>';
    i++;
    $('#AppendMore').append(html);
  });
  $('body').delegate('.DeleteItem', 'click', function() {
    var id = $(this).attr('id');
    $('#DeleteItem' + id).remove();
  });

</script>
@endsection
