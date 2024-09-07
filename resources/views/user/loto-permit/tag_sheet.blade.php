<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tag Sheet | {{ $permit->tag_number }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
</head>
<body>
  <div class="wrapper">

      <div class="row">
        @php
        $i_s = 100;
        @endphp
        @foreach ($permit->getSubList as $sublist)
        <div class="col-4">
              <div class="card text-white p-1 bg-{{ !empty($sublist->tag_color == 1) ? 'danger' : '' }} mb-2" style="max-width: 20rem;">
                <div class="card-header text-center mt-3">
                  <span class="brand-text"><img src="{{ url('assets/dist/img/logo-plnip.png') }}" style="height: 2.1rem" alt="PLN IP Logo"></span>
                  <br>
                  <strong>UBP Banten 1 Suralaya</strong>
                </div>
                <div class="card-header bg-light font-weight-bold p-1">
                  <table>
                    <tbody>
                      <tr>
                        <td>Tag No</td>
                        <td> : </td>
                        <td>{{ $permit->tag_number }}</td>
                      </tr>
                      <tr>
                        <td>Date</td>
                        <td> : </td>
                        <td>{{ ($permit->created_at)->translatedFormat('l, d F Y') }}</td>
                      </tr>
                      <tr>
                        <td>Unit</td>
                        <td> : </td>
                        <td>BSLA PGU</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-body text-center mb-0 mt-1">
                  <h1>
                    <span class="border border-white rounded-pill text-center px-4 bg-{{ !empty($sublist->tag_color == 1) ? 'danger' : 'warning' }}" style="border-width: 5px !important; border-color: black !important;"><strong style="color: black;">{{ !empty($sublist->tag_color == 1) ? 'DANGER' : 'WARNING' }}</strong></span>
                  </h1>
                  <br>
                  <h2>
                    <span class="border border-white bg-white px-2">
                        <strong>DO NOT OPERATE</strong>
                    </span>
                  </h2>
                </div>
                <hr class="bg-black mt-0">
                <div class="card-body bg-light p-1">
                    <table>
                        <tbody>
                            <tr>
                                <td>Dept.</td>
                                <td> : </td>
                                <td><strong>{{ $permit->created_by }}</strong></td>
                            </tr>
                            <tr>
                                <td>Equipment</td>
                                <td> : </td>
                                <td><strong>{{ $sublist->peralatan }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                  <hr class="bg-black mb-0">
                  <p>Remarks :</p>
                  {!! old('catatan', $permit->catatan) !!}
                </div>
              </div>
        </div>
        @php
        $i_s++;
        @endphp
        @endforeach
      </div>
  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    window.addEventListener("load", window.print());

  </script>
</body>
</html>
