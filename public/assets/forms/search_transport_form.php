<?php

?>

<form class="form-horizontal" role="form" action="search_transport_process.php" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_type">Travel By:</label>
    <div class="col-sm-8">
      <label class="radio-inline"><input type="radio" name="transport_type" value="Bus" required>Bus</label>
      <label class="radio-inline"><input type="radio" name="transport_type" value="Train" required>Train</label>
      <label class="radio-inline"><input type="radio" name="transport_type" value="Plane" required>Plane</label> 
      <label class="radio-inline"><input type="radio" name="transport_type" value="Others" required>Others</label> 
    </div>
      
  </div>

  <h4>From</h4>
  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_from_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="transport_from_division" class="form-control" name="transport_from_division" required>
                  <option selected disabled>Choose a Division</option>
                  <option>Any</option>
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
    <label class="control-label col-sm-1" for="transport_from_district">District:</label>
      <div class="col-sm-4 selectContainer">
       		<select id="transport_from_district" class="form-control" name="transport_from_district" required>
                  <option selected disabled>Choose a District</option>
                  
              </select>
    	</div>
  </div>

  <div class="form-group">
		<label class="control-label col-sm-1" for="transport_from_upazilla">Upazilla:</label>
     	<div class="col-sm-4 selectContainer">
  		<select id="transport_from_upazilla" class="form-control" name="transport_from_upazilla" required>
              <option selected disabled>Choose an Upazilla</option>  
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
                  <option>Any</option>
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
    <label class="control-label col-sm-1" for="transport_to_district">District:</label>
      <div class="col-sm-4 selectContainer">
          <select id="transport_to_district" class="form-control" name="transport_to_district" required>
                  <option selected disabled>Choose a District</option>
                  
              </select>
      </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="transport_to_upazilla">Upazilla:</label>
      <div class="col-sm-4 selectContainer">
      <select id="transport_to_upazilla" class="form-control" name="transport_to_upazilla" required>
              <option selected disabled>Choose an Upazilla</option>  
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