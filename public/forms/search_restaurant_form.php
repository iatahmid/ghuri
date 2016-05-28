<?php

$foodTypes = array("Bangla", "Chinese", "Thai", "Mexican", "Any");

?>

<form class="form-horizontal" role="form" action="search_restaurant_process.php" method="POST">
    
  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_type">Type:</label>
    <div class="col-sm-8">
      <?php
        foreach ($foodTypes as $type) {
          echo "<label class='radio-inline'><input type='radio' name='restaurant_type' value='$type' required>$type</label>";
        }
      ?>
    </div>
      
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="restaurant_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="restaurant_division" class="form-control" name="restaurant_division" required>
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
    <label class="control-label col-sm-1" for="restaurant_district">District:</label>
      <div class="col-sm-4 selectContainer">
       		<select id="restaurant_district" class="form-control" name="restaurant_district" required>
                  <option selected disabled>Choose a District</option>
                  
              </select>
    	</div>
  </div>

  <div class="form-group">
		<label class="control-label col-sm-1" for="restaurant_upazilla">Upazilla:</label>
     	<div class="col-sm-4 selectContainer">
  		<select id="restaurant_upazilla" class="form-control" name="restaurant_upazilla" required>
              <option selected disabled>Choose an Upazilla</option>  
          </select>
		</div>
	</div>

  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" name="goButton_restaurant" action="search_restaurant_process.php">Go!</button>
    </div>
  </div>

</form>