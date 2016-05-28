<script>
$(".date-picker").datepicker();
$(".date-picker").on("change", function() {
  
    var val = $(this).attr("value");
  //var val = $("label[for='" + id + "']").text();
  $("#msg").text(val);

  /*var id = $(this).attr("id");
  var val = $("label[for='" + id + "']").text();
  $("#msg").text(val + " changed");*/
});
</script>