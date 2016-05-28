<div>
<form class="form-horizontal" role="form" action='search_tourist_spot_process.php' method="POST">
  <div class="form-group">
    <label class="control-label col-sm-1" for="division">Division:</label>
    <div class="col-sm-4 selectContainer">
       <select id="division" class="form-control" name="selectedDivision" required>
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
    <label class="control-label col-sm-1" for="district">District:</label>
     <div class="col-sm-4 selectContainer">
       <select id="district" class="form-control" name="selectedDistrict" required>
          <option selected disabled>Choose a District</option>
          
        </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="upazilla">Upazilla:</label>
     <div class="col-sm-4 selectContainer">
      <select id="upazilla" class="form-control" name="selectedUpazilla" required>
          <option selected disabled>Choose an Upazilla</option>  
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