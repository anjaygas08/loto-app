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
          <h1>Formulir Lock Out Tag Out (LOTO)</h1>
        </div>
      </div>
    </div>
  </section>
  @include('admin.layouts._message')
  <section class="content">
    <form action="" method="post">
      @csrf
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="invoice p-3 mb-1">
              <div class="row">
                <div class="col-12">
                  <h4>
                    <span><img src="{{ url('assets/dist/img/logo-plnip.png') }}" style="height: 2.1rem" alt="PLN IP Logo"></span>
                    <small class="float-right">No. Tagging : <strong>{{ old('tag_number', $permit->tag_number) }}</strong></small>
                    <br>
                    <small class="float-right">Status Tagging :
                      <strong class="badge bg-{{ $permit->status_style }}" value="{{ old('status', $permit->status) }}">
                        {{ $permit->status == $getLOTOStatus->id ? $getLOTOStatus->name : '' }}
                      </strong>
                    </small>
                    @if ($permit->status == 3)
                    <br>
                    <small class="float-right">Release Date :
                      <strong>{{ ($permit->updated_at)->translatedFormat('l, d F Y') }}</strong>
                    </small>
                    @endif
                  </h4>
                  <br>
                  <h3 class="text-center">
                    <small>Formulir Lock Out Tag Out (LOTO)</small>
                  </h3>
                </div>
              </div>
              <hr>
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  <table>
                    <tbody>
                      <tr>
                        <td>Tanggal Pengajuan Tagging</td>
                        <td> : </td>
                        {{-- <input type="hidden" name="created_at" value="{{ old('created_at', $permit->created_at) }}"> --}}
                        <td>
                          <strong>{{ ($permit->created_at)->translatedFormat('l, d F Y') }}</strong>
                        </td>
                      </tr>
                      <tr>
                        <td>Bidang</td>
                        <td> : </td>
                        {{-- <input type="hidden" name="created_by" value="{{ old('created_by', $permit->created_by) }}"> --}}
                        <td><strong>{{ old('created_by', $permit->created_by) }}</strong></td>
                      </tr>
                      <tr>
                        <td>No. Work Order</td>
                        <td> : </td>
                        <input type="hidden" name="wo_number" value="{{ old('wo_number', $permit->wo_number) }}">
                        <td><strong>{{ old('wo_number', $permit->wo_number) }}</strong></td>
                      </tr>
                      <tr>
                        <td>Kegiatan Pemeliharaan</td>
                        <td> : </td>
                        {{-- <input type="hidden" name="name" value="{{ old('name', $permit->name) }}"> --}}
                        <td><strong>{{ old('name', $permit->name) }}</strong></td>
                      </tr>
                      <tr>
                        <td>Uraian Pekerjaan</td>
                        <td> : </td>
                        {{-- <input type="hidden" name="description" value="{{ old('description', $permit->description) }}"> --}}
                        <td><strong>{{ old('description', $permit->description) }}</strong></td>
                      </tr>
                      <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <input type="hidden" name="lokasi" value="{{ old('lokasi', $permit->lokasi) }}">
                        <td><strong>{{ old('lokasi', $permit->lokasi) }}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <hr>
              <table>
                <tbody>
                  <tr>
                    <td><strong>Catatan Khusus Oleh Pelaksana Pekerjaan :</strong></td>
                  </tr>
                  <tr>
                    <td class="p-3">{!! old('catatan', $permit->catatan) !!}</td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <h4 class="text-center"><small>List Peralatan Yang Diisolasi</small></h4>
              <form action="" method="post">
                @csrf
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Peralatan</th>
                          <th>No. Peralatan/KKS</th>
                          <th>Jenis Peralatan</th>
                          <th class="text-center">Status Peralatan</th>
                          <th>Tag Colour</th>
                          <th>Checklist Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($permitJoin as $key=>$sublist)
                        <tr>
                          <td><strong>{{ ++$key }}</strong>({{ $sublist->permit_sublist_id }})</td>
                          <td>{{ $sublist->peralatan }}</td>
                          <td>{{ $sublist->no_peralatan }}</td>
                          <td>{{ $sublist->category_name }}</td>
                          <td class=" text-center">
                            <span class="badge" style="background-color: {{ $sublist->status_color_code }};">{{ $sublist->sub_category_name }}</span>
                          </td>
                          <td class="text-center">
                            <span class="badge" style="background-color: {{ $sublist->tag_color_code }};">{{ $sublist->tag_color_name }}</span>
                          </td>
                          <td class="text-center">
                            <span class="badge" style="background-color: {{ $sublist->checklist_code }};">{{ $sublist->checklist_name }}</span>
                          </td>
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
                          <th class="text-center">Sign Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Operator</td>
                          <td class="text-center">
                            <div class="badge bg-{{ $permit->op_status_style }}">{{ $permit->op_sign == 0 ? 'Waiting' : 'Signed' }}</div>
                          </td>
                        </tr>
                        <tr>
                          <td>K3L</td>
                          <td class="text-center">
                            <div class="badge bg-{{ $permit->safety_status_style }}">{{ $permit->safety_sign == 0 ? 'Waiting' : 'Signed' }}</div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                @if (Str::length(Auth::user()) > 0)
                @if (Auth::user()->is_admin == "user2")
                <div class="text-right">
                  @if ($permit->op_sign == 0 && $permit->status == 1)
                  <a href="{{ url('user/loto-permit/tag_sheet/'.$permit->id) }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  @else
                  @endif
                </div>
                @endif
                @endif
            </div>
            @if (Str::length(Auth::user()) > 0)
            @if (Auth::user()->is_admin == "user2")
            <div class="card-footer text-center">
              @if ($permit->op_sign == 0 && $permit->status == 1)
              <a href="{{ url('user/loto-permit/op_sign/'.$permit->id) }}" class="btn btn-primary btn-block elevation-2" onclick="return confirm('Are you sure?')">Sign</a>
              @elseif($permit->status == 2)
              <a href="{{ url('user/loto-permit/op_unsign/'.$permit->id) }}" class="btn btn-success btn-block elevation-2">Signed by Operator <i class="fas fa-check"></i></a>
              @endif
            </div>
            @endif
            @endif
            @if (Str::length(Auth::user()) > 0)
            @if (Auth::user()->is_admin == "user2")
            <div class="card-footer text-center">
              @if ($permit->op_sign == 0 && $permit->status == 3)
              <a href="{{ url('user/loto-permit/op_sign_release/'.$permit->id) }}" class="btn btn-primary btn-block elevation-2" onclick="return confirm('Are you sure?')">Sign</a>
              @elseif($permit->op_sign == 1)
              <a href="{{ url('user/loto-permit/op_unsign_release/'.$permit->id) }}" class="btn btn-success btn-block elevation-2">Released by Operator <i class="fas fa-check"></i></a>
              @endif
            </div>
            @endif
            @endif
            @if (Str::length(Auth::user()) > 0)
            @if (Auth::user()->is_admin == "user3")
            <div class="card-footer text-center">
              @if ($permit->safety_sign == 0 && $permit->status == 1)
              <a href="{{ url('user/loto-permit/safety_sign/'.$permit->id) }}" class="btn btn-primary btn-block elevation-2" onclick="return confirm('Are you sure?')">Sign</a>
              @elseif($permit->status == 2)
              <a href="{{ url('user/loto-permit/safety_unsign/'.$permit->id) }}" class="btn btn-success btn-block elevation-2">Signed by K3L <i class="fas fa-check"></i></a>
              @endif
            </div>
            @endif
            @endif
            @if (Str::length(Auth::user()) > 0)
            @if (Auth::user()->is_admin == "user3")
            <div class="card-footer text-center">
              @if ($permit->safety_sign == 0 && $permit->status == 3)
              <a href="{{ url('user/loto-permit/safety_sign_release/'.$permit->id) }}" class="btn btn-primary btn-block elevation-2" onclick="return confirm('Are you sure?')">Sign</a>
              @elseif($permit->safety_sign == 1)
              <a href="{{ url('user/loto-permit/safety_unsign_release/'.$permit->id) }}" class="btn btn-success btn-block elevation-2">Released by K3L <i class="fas fa-check"></i></a>
              @endif
            </div>
            @endif
            @endif
            {{-- Form Release LOTO --}}
            @if ($permit->status == 2)
            @if (Str::length(Auth::user()) > 0)
            @if (Auth::user()->is_admin == "user1")
            <div class="card-footer text-center">
              <a href="{{ url('user/loto-permit/release-tagging/'.$permit->id) }}" class="btn btn-primary btn-block elevation-2" onclick="return confirm('Are you sure?')">Request to Release LOTO</a>
            </div>
            @endif
            @endif
            @endif
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </form>
  </section>
</div>

@endsection

@section('script')


@endsection
