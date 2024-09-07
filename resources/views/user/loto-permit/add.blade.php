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
          <h1>Form LOTO</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form action="" method="post" id="insert_form">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label>No. Tagging</label>
                      <input type="text" class="form-control" value="{{ old('tag_number', $permit->tag_number) }}" id="tag_number" name="tag_number" readonly>
                    </div>
                    <div class="col-md-6">
                      <label>Bidang</label>
                      <input type="text" class="form-control" value="{{ old('created_by', $permit->created_by) }}" id="created_by" name="created_by" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>No. Work Order</label>
                  <input type="text" class="form-control" value="{{ old('wo_number', $permit->wo_number) }}" id="wo_number" name="wo_number" placeholder="No. Work Order">
                </div>
                <div class="form-group">
                  <label>Kegiatan Pemeliharaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('name', $permit->name) }}" name="name" placeholder="Nama Kegiatan Pemeliharaan">
                </div>
                <div class="form-group">
                  <label>Uraian Pekerjaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('description', $permit->description) }}" name="description" placeholder="Uraian Pekerjaan">
                </div>
                <div class="form-group">
                  <label>Lokasi Pekerjaan <span style="color: red">*</span></label>
                  <input type="text" class="form-control" required value="{{ old('lokasi', $permit->lokasi) }}" name="lokasi" placeholder="Lokasi Pekerjaan">
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
                          <div class="input-group date">
                            <input value="{{ old('created_at', $permit->created_at) }}" class="form-control" id="created_at" required="required" name="created_at" type="text">
                            <span class="input-group-addon">
                              <i class="glyphicon glyphicon-calendar"></i>
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
                        <table class="table table-bordered" id="item_table">
                          <thead class="text-center">
                            <tr>
                              <th>Nama Peralatan</th>
                              <th>No. KKS</th>
                              <th>Jenis</th>
                              <th>Status</th>
                              <th>Request Tag Color</th>
                              <th class="text-center">
                                <div type="button" name="AddMore" class="badge bg-primary AddMore">Add</div>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            {{-- Javascript Table --}}
                            @php
                            $i_s = 100;
                            @endphp
                            @foreach ($permit->getSubList as $sublist)
                            <tr>
                              <td>
                                <input class="form-control" value="{{ $sublist->peralatan }}" id="peralatan" name="sublist[{{ $i_s }}][peralatan]" type="text" placeholder="Nama Peralatan">
                              </td>
                              <td>
                                <input class="form-control" value="{{ $sublist->no_peralatan }}" id="no_peralatan" name="sublist[{{ $i_s }}][no_peralatan]" type="text" placeholder="No. KKS">
                              </td>
                              <td>
                                <select class="form-control ChangeCategory" id="ChangeCategory" data-sub_category_id="{{ $i_s }}" name="sublist[{{ $i_s }}][category_id]">
                                  <option value="">Select</option>
                                  @foreach ($getCategory as $category)
                                  <option {{ ($sublist->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <select class=" form-control getSubCategory" id="getSubCategory{{ $i_s }}" name="sublist[{{ $i_s }}][sub_category_id]">
                                  <option value="">Select Status</option>
                                  @foreach ($getSubCategory as $sub_category)
                                  <option {{ ($sublist->sub_category_id == $sub_category->id) ? 'selected' : '' }} value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <select class="form-control" name="sublist[{{ $i_s }}][tag_color]">
                                  <option value="">Select</option>
                                  @foreach ($getTagColor as $tagcolor)
                                  <option {{ ($sublist->tagcolor == $tagcolor->id) ? 'selected' : '' }} style="background-color: {{ $tagcolor->code }}" value="{{ $tagcolor->id }}">{{ $tagcolor->name }}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td class="text-center align-middle justify-center">
                                <div type="button" name="DeleteItem" class="badge bg-danger DeleteItem">
                                  <i class="fas fa-minus"></i>
                                </div>
                              </td>
                            </tr>
                            @php
                            $i_s++;
                            @endphp
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="catatan">Catatan Khusus Oleh Pelaksana Pekerjaan <span style="color: red">*</span></label>
                  <input value="{{ old('catatan', $permit->catatan) }}" id="catatan" type="hidden" name="catatan">
                  <trix-editor input="catatan"></trix-editor>
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
            <button type="submit" class="btn btn-primary btn-block elevation-2">Tagging Request</button>
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
  $(document).ready(function() {
    var i = 100;

    $(document).on('click', '.AddMore', function() {
      i++;
      var html = '';
      html += '<tr>';
      html += '<td><input class="form-control" id="peralatan" name="sublist[' + i + '][peralatan]" type="text" placeholder="Nama Peralatan"></td>';
      html += '<td><input class="form-control" id="no_peralatan" name="sublist[' + i + '][no_peralatan]" type="text" placeholder="No. KKS"></td>';
      html += '<td><select class="form-control ChangeCategory" id="ChangeCategory" data-sub_category_id="' + i + '" name="sublist[' + i + '][category_id]"><option value="">Select</option> @foreach ($getCategory as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach </select></td>';
      html += '<td><select class="form-control getSubCategory" id="getSubCategory' + i + '" name="sublist[' + i + '][sub_category_id]"><option value="">Select Status</option></select></td>';
      html += '<td><select class="form-control" name="sublist[' + i + '][tag_color]"><option value="">Select</option> @foreach ($getTagColor as $tagcolor)<option  style="background-color: {{ $tagcolor->code }}" value="{{ $tagcolor->id }}">{{ $tagcolor->name }}</option>@endforeach </select></td>';
      html += '<td class="text-center align-middle justify-center"><div type="button" name="DeleteItem" class="badge bg-danger DeleteItem"><i class="fas fa-minus"></i></div></td>';
      html += '</tr>';
      $('tbody').append(html);
    });
    $(document).on('click', '.DeleteItem', function() {
      $(this).closest('tr').remove();
    });
  });

  $(document).on('change', '.ChangeCategory', function() {

    var category_id = $(this).val();
    var sub_category_id = $(this).data('sub_category_id');

    $.ajax({
      type: "POST"
      , url: "{{ url('get_sub_category') }}"
      , data: {
        category_id: category_id
        , "_token": "{{ csrf_token() }}"
      }
      , success: function(data) {
        var html = '<option value="">Select Status</option>';
        html += data;
        $('#getSubCategory' + sub_category_id).html(html);
      }
      , error: function(data) {

      }
    });
  });

  document.addEventListener('trix-file-accept', function() {
    e.preventDefault();
  });

  $(document).ready(function() {
    $('.date').datepicker({
      autoclose: true
    });
  });

</script>
@endsection
