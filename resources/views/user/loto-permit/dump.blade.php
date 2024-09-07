<script>
  $('body').delegate('.ChangeCategory', 'change', function(e) {
    var id = $(this).val();

    $.ajax({
      type: "POST"
      , url: "{{ url('get_sub_category') }}"
      , data: {
        id: id
        , "_token": "{{ csrf_token() }}"
      }
      , dataType: "json"
      , success: function(data) {
        $('#getSubCategory').html(data.html);
      }
      , error: function(data) {

      }
    });
  });

  var i = 101;
  var count = 0;
  $('body').delegate('.AddMore', 'click', function() {
    count++;
    var html = '';
    html += '<tr id="DeleteItem' + i + '">\n\
                    <td>\n\
                        <input class="form-control" id="peralatan" name="sublist[' + i + '][peralatan]" type="text" placeholder="Nama Peralatan">\n\
                    </td>\n\
                    <td>\n\
                        <input class="form-control" id="no_peralatan" name="sublist[' + i + '][no_peralatan]" type="text" placeholder="No. KKS">\n\
                    </td>\n\
                    <td>\n\
                        <select class="form-control ChangeCategory" id="ChangeCategory" data-sub_category_id="' + i + '" name="sublist[' + i + '][jenis_peralatan]">\n\
                            <option value="">Select</option>\n\
                            @foreach ($getCategory as $category)\n\
                            <option value="{{ $category->id }}">{{ $category->name }}</option>\n\
                            @endforeach\n\
                        </select>\n\
                    </td>\n\
                    <td>\n\
                        <select class="form-control" id="getSubCategory' + i + '" name="sublist[' + i + '][status_peralatan]">\n\
                            <option value="">Select Status</option>\n\
                        </select>\n\
                    </td>\n\
                    <td class="text-center align-middle justify-center">\n\
                        <div type="button" id="' + i + '" class="badge bg-danger DeleteItem"><i class="fas fa-minus"></i></div>\n\
                        <div><input class="form-control" value="{{ Auth::user()->id }}" id="created_by" name="sublist[' + i + '][created_by]" type="hidden"></div>\n\
                    </td>\n\
                    </tr>';
    i++;
    $('#AppendMore').append(html);
  });
  $('body').delegate('.DeleteItem', 'click', function() {
    var id = $(this).attr('id');
    $('#DeleteItem' + id).remove();
  });

  $('body').delegate('.ChangeCategory', 'change', function() {
    var category_id = $(this).val();
    var sub_category_id = $(this).data('sub_category_id');

    $.ajax({
      url: "{{ url('user/get_sub_category') }}"
      , method: "POST"
      , data: {
        category_id: category_id
      }
      , dataType: "json"
      , success: function(data) {
        var html = '<option value="">Select Status</option>';
        html += data;
        $('#getSubCategory' + category_id).html(html);
      }
    });
  });

  //   $('body').delegate('#ChangeCategory' + i + '', 'change', function(e) {
  //     var id = $(this).val();
  //     var

  //     $.ajax({
  //       type: "POST"
  //       , url: "{{ url('user/get_sub_category') }}"
  //       , data: {
  //         "id": id
  //         // , "_token": "{{ csrf_token() }}"
  //       }
  //       , dataType: "json"
  //       , success: function(data) {
  //         $('#getSubCategory' + i + '').html(data.html);
  //       }
  //       , error: function(data) {

  //       }
  //     });
  //   });

</script>
