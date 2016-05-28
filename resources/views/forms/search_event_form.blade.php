<?php

$festivalTypes = array("Religious", "Arts", "Food and Drinks", "Seasonal", "Others", "Any");
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

?>


    
<form class="form-horizontal" role="form" action="search_event_process.php" method="POST">

    <div class="form-group">
    <label class="control-label col-sm-1" for="festival_name">Name:</label>
      <div class="col-sm-4">
            <input type="text" class="form-control" id="festival_name" name="festival_name" placeholder="Enter Festival Name">
      </div>
    </div>


    <div class="form-group">
    <label class="control-label col-sm-1" for="festival_type">Type:</label>
    <div class="col-sm-8">
      <?php
        foreach ($festivalTypes as $type) {
          echo "<label class='radio-inline'><input type='radio' name='festival_type' value='$type' required>$type</label>";
        }
      ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="festival_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="festival_division" class="form-control" name="festival_division" required>
          <option disabled>Choose a Division</option>
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
    <label class="control-label col-sm-1" for="festival_district">District:</label>
      <div class="col-sm-4 selectContainer">
            <select id="festival_district" class="form-control" name="festival_district" required>
                  <option disabled>Choose a District</option>
                  <option selected>Any</option>
                  
              </select>
        </div>
  </div>

  <div class="form-group">
        <label class="control-label col-sm-1" for="festival_upazilla">Upazilla:</label>
        <div class="col-sm-4 selectContainer">
        <select id="festival_upazilla" class="form-control" name="festival_upazilla" required>
              <option disabled>Choose an Upazilla</option>
              <option selected>Any</option>
          </select>
        </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-1" for="festival_month">Month:</label>
      <div class="col-sm-4 selectContainer">
        <select id="festival_month" class="form-control" name="festival_month" required>
          <option selected disabled>Choose a Month</option>
          <?php 
            foreach ($months as $value) {
              echo "<option>$value</option>";
            }
          ?>
        </select>
      </div>
    </div>
<hr />

  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" name="goButton_event" action="search_event_process.php">Go!</button>
    </div>
  </div>

</form>