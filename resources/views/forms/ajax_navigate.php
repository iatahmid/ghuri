<script>
$('#division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#district').empty();
    $('#upazilla').empty();
    
    $('#district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#upazilla').empty();
	$('#upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>