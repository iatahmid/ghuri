<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php

$foodTypes = array("Bangla", "Chinese", "Thai", "Mexican", "Any");

?>
<form class="form-horizontal" method="POST" action="{{ url('/').'/search_restaurant'}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<form class="form-horizontal" role="form" action="search_restaurant_process.php" method="POST">
    
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_type">Type:</label>
    <div class="col-sm-8">
      <?php
        foreach ($foodTypes as $type) {
          echo "<label class='radio-inline'><input type='radio' name='restaurant_type' id='restaurant_type' value='$type' required>$type</label>";
        }
      ?>
    </div>
      
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="restaurant_division" class="form-control" name="restaurant_division" required>
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
    <label class="control-label col-sm-1" for="restaurant_district">District:</label>
      <div class="col-sm-4 selectContainer">
       		<select id="restaurant_district" class="form-control" name="restaurant_district" required>
                 <option vaule =''selected disabled>choose a district</option>
                  
              </select>
    	</div>
  </div>

  <div class="form-group">
		<label class="control-label col-sm-1" for="restaurant_upazilla">Upazilla:</label>
     	<div class="col-sm-4 selectContainer">
  		<select id="restaurant_upazilla" class="form-control" name="restaurant_upazilla" required>
              <<option vaule =''selected disabled>choose an upazilla</option>
          </select>
		</div>
	</div>

  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" name="goButton_restaurant" action="search_restaurant_process.php">Go!</button>
    </div>
  </div>

</form>
  <script>
$('#restaurant_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#restaurant_district').empty();
    $('#restaurant_upazilla').empty();
    
    $('#restaurant_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#restaurant_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#restaurant_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#restaurant_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#restaurant_upazilla').empty();
	$('#restaurant_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#restaurant_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>