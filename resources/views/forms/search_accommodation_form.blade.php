<?php

$roomTypes = array("Standard", "Family", "Suite", "Resort", "Cottage");

?>

<form class="form-horizontal" role="form" action="search_accommodation_process.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-1" for="accommodation_division">Division:</label>
      <div class="col-sm-4 selectContainer">
         <select id="accommodation_division" class="form-control" name="accommodation_division" required>
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
      <label class="control-label col-sm-1" for="accommodation_district">District:</label>
        <div class="col-sm-4 selectContainer">
         		<select id="accommodation_district" class="form-control" name="accommodation_district" required>
                    <option selected disabled>Choose a District</option>
                    
                </select>
      	</div>
    </div>

    <div class="form-group">
			<label class="control-label col-sm-1" for="accommodation_upazilla">Upazilla:</label>
       	<div class="col-sm-4 selectContainer">
    		<select id="accommodation_upazilla" class="form-control" name="accommodation_upazilla" required>
                <option selected disabled>Choose an Upazilla</option>  
            </select>
			</div>
	</div>

    <div class="form-group">
			<label class="control-label col-sm-1" for="accommodation_type">Type:</label>
       	<div class="col-sm-4 selectContainer">
    		<select id="accommodation_type" class="form-control" name="accommodation_type" required>
                <option selected disabled>Select Type</option>  
                <option>Any</option>  
                <?php 
                	foreach ($roomTypes as $type) {
                		echo "<option>$type</option>";
                	}
                ?>
            </select>
		</div>
	</div>

    <div class="form-group">
			<label class="control-label col-sm-1" for="accommodation_capacity">Capacity:</label>
       	<div class="col-sm-4 selectContainer">
    		<select id="accommodation_capacity" class="form-control" name="accommodation_capacity" required>
                <option selected disabled>Capacity</option>  
                <?php 
                	for($i=1; $i<11; $i++) {
                		echo "<option>$i</option>";
                	}
                ?>
                <option>More</option>  
            </select>
		</div>
	</div>

    <div class="form-group">        
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-primary" action="search_accommodation_process.php" name="goButton_accommodation">Go!</button>
      </div>
    </div>
</form>