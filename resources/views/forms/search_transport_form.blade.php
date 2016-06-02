<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<form class="form-horizontal" method="POST" action="{{ url('/').'/search_transport'}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_type">Travel By:</label>
    <div class="col-sm-8">
      <label class="radio-inline"><input type="radio" name="transport_type" id = "transport_type" value="Bus" required>Bus</label>
      <label class="radio-inline"><input type="radio" name="transport_type" id = "transport_type" value="Train" required>Train</label>
      <label class="radio-inline"><input type="radio" name="transport_type" id = "transport_type" value="Plane" required>Plane</label> 
      <label class="radio-inline"><input type="radio" name="transport_type" id = "transport_type" value="Others" required>Others</label> 
    </div>
      
  </div>

  <h4>From</h4>
  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_from_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="transport_from_division" class="form-control" name="transport_from_division" required>
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
    <label class="control-label col-sm-1" for="transport_from_district">District:</label>
      <div class="col-sm-4 selectContainer">
       		<select id="transport_from_district" class="form-control" name="transport_from_district" required>
                  <option vaule =''selected disabled>choose a district</option>
                  
              </select>
    	</div>
  </div>

  <div class="form-group">
		<label class="control-label col-sm-1" for="transport_from_upazilla">Upazilla:</label>
     	<div class="col-sm-4 selectContainer">
  		<select id="transport_from_upazilla" class="form-control" name="transport_from_upazilla" required>
              <option vaule =''selected disabled>choose an Upazilla</option>
          </select>
  		</div>
	</div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_from_tourist_spot">Tourist Spot:</label>
      <div class="col-sm-4 selectContainer">
      <select id="transport_from_tourist_spot" class="form-control" name="transport_from_tourist_spot" required>
              <option selected>Choose a Tourist Spot</option>  
          </select>
      </div>
  </div>

  <h4>To</h4>
  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_to_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="transport_to_division" class="form-control" name="transport_to_division" required>
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
    <label class="control-label col-sm-1" for="transport_to_district">District:</label>
      <div class="col-sm-4 selectContainer">
          <select id="transport_to_district" class="form-control" name="transport_to_district" required>
                  <option value='' selected disabled>Choose a District</option>
                  
              </select>
      </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_to_upazilla">Upazilla:</label>
      <div class="col-sm-4 selectContainer">
      <select id="transport_to_upazilla" class="form-control" name="transport_to_upazilla" required>
              <option value ='' selected disabled>Choose an Upazilla</option>  
          </select>
      </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_to_tourist_spot">Tourist Spot:</label>
      <div class="col-sm-4 selectContainer">
      <select id="transport_to_tourist_spot" class="form-control" name="transport_to_tourist_spot" required>
              <option selected>Choose a Tourist Spot</option>  
          </select>
      </div>
  </div>


    <div class="form-group">        
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-primary" name="goButton_transport" action="search_transport_process.php">Go!</button>
      </div>
    </div>
</form>
  <script>
$('#transport_from_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#transport_from_district').empty();
    $('#transport_from_upazilla').empty();
    
    $('#transport_from_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#transport_from_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#transport_from_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_from_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#transport_from_upazilla').empty();
	$('#transport_from_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#transport_from_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_from_upazilla').on('change',function(e){
    console.log(e);
   
    var upazilla_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_tourist_spot?upazilla_name='+upazilla_name,function(data){
	 //console.log(data);
	$('#transport_from_tourist_spot').empty();
	$('#transport_from_tourist_spot').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,spot_object){
	   
	  $('#transport_from_tourist_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
	  
	});
	
    });
});
</script>
<script>
$('#transport_to_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#transport_to_district').empty();
    $('#transport_to_upazilla').empty();
    
    $('#transport_to_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#transport_to_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#transport_to_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_to_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#transport_to_upazilla').empty();
	$('#transport_to_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#transport_to_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#transport_to_upazilla').on('change',function(e){
    console.log(e);
   
    var upazilla_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_tourist_spot?upazilla_name='+upazilla_name,function(data){
	 //console.log(data);
	$('#transport_to_tourist_spot').empty();
	$('#transport_to_tourist_spot').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,spot_object){
	   
	   $('#transport_to_tourist_spot').append('<option value="'+spot_object.SPOT_NAME+'">'+spot_object.SPOT_NAME+'</option>');
	   
	});
	
    });
});
</script>