<?php

$festivalTypes = array("Religeous", "Cultural", "Traditional", "Any");

?>


    
<form class="form-horizontal" role="form" action="search_event_process.php" method="POST">

    <div class="form-group">
    <label class="control-label col-sm-1" for="festival_type">Type:</label>
    <div class="col-sm-8">
      <?php
        foreach ($festivalTypes as $type) {
          echo "<label class='radio-inline'><input type='radio' name='festival_type' value='$type'>$type</label>";
        }
      ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-1" for="festival_division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="festival_division" class="form-control" name="festival_division" required>
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
            <select id="festival_district" class="form-control" name="festival_district" required>
                  <option selected disabled>Choose a District</option>
                  
              </select>
        </div>
  </div>

  <div class="form-group">
        <label class="control-label col-sm-1" for="festival_upazilla">Upazilla:</label>
        <div class="col-sm-4 selectContainer">
        <select id="festival_upazilla" class="form-control" name="festival_upazilla" required>
              <option selected disabled>Choose an Upazilla</option>  
          </select>
        </div>
    </div>


    <div class="form-group">
        <label for="from_datepicker" class="control-label">From</label>
        <div class="controls">
            <div class="col-sm-5 input-group">
                <label for="from_datepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                </label>
                <input id="from_datepicker" type="text" class="date-picker form-control" name="from_date" required/>
            </div>
        </div>
    </div>


<div class="form-group">
        <label for="to_datepicker" class="control-label">To</label>
        <div class="controls">
            <div class="col-sm-5 input-group">
                <label for="to_datepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                </label>
                <input id="to_datepicker" type="text" class="date-picker form-control" name="to_date" required/>
            </div>
        </div>
    </div>
<hr />

  <div class="form-group">        
    <div class="col-sm-offset-1 col-sm-10">
      <button type="submit" class="btn btn-primary" name="goButton_event" action="search_event_process.php">Go!</button>
    </div>
  </div>

</form>


<script> $(".date-picker").datepicker(); </script>