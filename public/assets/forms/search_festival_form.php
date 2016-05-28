<?php

$festivalTypes = array("Religeous", "Cultural", "Traditional", "Any");

?>

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
          <option>Dhaka</option>
          <option>Chittagong</option>
          <option>Sylhet</option>
          <option>Barisal</option>
          <option>Rajshahi</option>
          <option>Khulna</option>
          <option>Rangpur</option>
          <option>Mymensingh</option>
        </select>
    </div>
  </div>
    
  <div class="form-group">
    <label class="control-label col-sm-1" for="festival_district">District:</label>
      <div class="col-sm-4 selectContainer">
       		<select id="festival_district" class="form-control" required>
                  <option disabled>Choose a District</option>
		  <option selected>Any</option>
                  
              </select>
    	</div>
  </div>

  <div class="form-group">
		<label class="control-label col-sm-1" for="festival_upazilla">Upazilla:</label>
     	<div class="col-sm-4 selectContainer">
  		<select id="festival_upazilla" class="form-control" required>
              <option disabled>Choose an Upazilla</option>
	      <option selected>Any</option>
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