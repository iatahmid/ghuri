<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<div>
<form class="form-horizontal" method="POST" action="{{ url('/').'/search_tourist_spot'}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">  <div class="form-group">
    <label class="control-label col-sm-1" for="spot_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="spot_division" class="form-control" name="spot_division" required>
          <option selected disabled>Choose a Division</option>
	      <option value='Dhaka'>Dhaka</option>
	      <option value='Chittagong'>Chittagong</option>
	      <option value='Sylhet'>Sylhet</option>
	      <option value='Barisal'>Barisal</option>
	      <option value='Rajshahi'>Rajshahi</option>
	      <option value='Khulna'>Khulna</option>
	      <option value='Rangpur'>Rangpur</option>
	      <option value='Mymensingh'>Mymensingh</option>
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="spot_district">District:</label>
     <div class="col-sm-4 selectContainer">
       <select id="spot_district" class="form-control" name="spot_district" required>
          <option vaule =''selected disabled>choose a district</option>
          
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="spot_upazilla">Upazilla:</label>
     <div class="col-sm-4 selectContainer">
      <select id="spot_upazilla" class="form-control" name="spot_upazilla" required>
          <option value='' selected disabled>choose an upazilla</option>  
      </select>
    </div>
  </div>

  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" action='search_tourist_spot_process.php' name="goButton">Go!</button>
    </div>
  </div>
</form>
</div>
<script>
$('#spot_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#spot_district').empty();
    $('#spot_upazilla').empty();
    
    $('#spot_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#spot_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#spot_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#spot_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#spot_upazilla').empty();
	$('#spot_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#spot_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>