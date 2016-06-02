
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php

$festivalTypes = array("Religeous", "Cultural", "Traditional", "Any");

?>
<form class="form-horizontal" method="POST" action="{{ url('/').'/search_festival'}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<form class="form-horizontal" role="form">
    
  <div class="form-group">
    <label class="control-label col-sm-1" for="festival_type">Type:</label>
    <div class="col-sm-8">
      <?php
        foreach ($festivalTypes as $type) {
          echo "<label class='radio-inline'><input type='radio' name='festival_type'>$type</label>";
        }
      ?>
    </div>
      
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="festival_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="festival_division" class="form-control" required>
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
    <label class="control-label col-sm-1" for="festival_district">District:</label>
      <div class="col-sm-4 selectContainer">
       		<select id="festival_district" class="form-control" required>
                  <option vaule =''selected disabled>choose a district</option>
                  
              </select>
    	</div>
  </div>

  <div class="form-group">
		<label class="control-label col-sm-1" for="festival_upazilla">Upazilla:</label>
     	<div class="col-sm-4 selectContainer">
  		<select id="festival_upazilla" class="form-control" required>
              <option vaule =''selected disabled>choose an Upazilla</option>
          </select>
		</div>
	</div>


  <div class="form-group">
    <label class="control-label col-sm-1" for="from_datetimepicker">From:</label>
      <div class='input-group date col-sm-4' id='from_datetimepicker'>
          <input type='text' class="form-control" required/>
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
          </span>
      </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="to_datetimepicker">To:</label>
      <div class='input-group date col-sm-4' id='to_datetimepicker'>
          <input type='text' class="form-control" required/>
          <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
          </span>
      </div>
  </div>
<hr />
  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary">Go!</button>
    </div>
  </div>

</form>
  <script>
$('#festival_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#festival_district').empty();
    $('#festival_upazilla').empty();
    
    $('#festival_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#festival_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#festival_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#festival_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#festival_upazilla').empty();
	$('#festival_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#festival_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>