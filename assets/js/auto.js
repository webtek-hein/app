  $(document).ready(function(e) {
    $("[name='department']").on('change', function() {
      var url = "http://localhost/app/custodian/department/get_item_per_department";
      $.ajax({
        type: "POST",
        url: url,
        data: $("#depts").serialize(),
      });
    });
  });
