
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php

$roomTypes = array("Standard", "Family", "Suite", "Resort", "Cottage");

?>
<!--{{Form::open(array('url'=>'accommodation_search'))}}-->
<!---{{Form::open(array('url'=>'', 'files'=>'true'))}}-->

<!--form class="form-horizontal" role="form" action="http://localhost/<laravel dir>/public/accommodation_search" method="POST"-->
<form class="form-horizontal" method="POST" action="{{ url('/').'/search_accommodation'}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-sm-1" for="accommodation_division">Division:</label>
	<div class="col-sm-4 selectContainer">
	  <select id="accommodation_division" class="form-control" name="accommodation_division" required>
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
      <label class="control-label col-sm-1" for="accommodation_district">District:</label>
        <div class="col-sm-4 selectContainer">
            <select id="accommodation_district" class="form-control input-sm" name="accommodation_district" required>
		<option vaule =''selected disabled>choose a district</option>
            </select>
      	</div>
    </div>

    <div class="form-group">
	<label class="control-label col-sm-1" for="accommodation_upazilla">Upazilla:</label>
	    <div class="col-sm-4 selectContainer">
		    <select id="accommodation_upazilla" class="form-control input-sm" name="accommodation_upazilla" required>
			<option value='' selected disabled>choose an upazilla</option>  
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
			foreach ($roomTypes as $type)
			{
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
		    for($i=1; $i<11; $i++)
		    {
			echo "<option>$i</option>";
		    }
	    ?>
	    <option>More</option>  
	    </select>
	</div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-primary"  name="goButton_accommodation">Go!</button>
      </div>
    </div>
<!--{{Form::close()}};-->
</form>

<script>
$('#accommodation_division').on('change',function(e){
    console.log(e);
   
    var division_name=e.target.value;
    //$('#accommodation_district').empty();
    $('#accommodation_district').empty();
    $('#accommodation_upazilla').empty();
    
    $('#accommodation_district').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
    $('#accommodation_upazilla').append($('<option>', {
	value: "Any",
	text: 'Any'
    }));
   
    //$('#accommodation_upazilla').empty();
    $.getJSON('ajax_district?division_name='+division_name,function(data){
	 //console.log(data);
	
	$.each(data ,function(index,district_object){
	   
	   $('#accommodation_district').append('<option value="'+district_object.DISTRICT_NAME+'">'+district_object.DISTRICT_NAME+'</option>');
	   
	});
	
    });
});
</script>
<script>
$('#accommodation_district').on('change',function(e){
    console.log(e);
   
    var district_name=e.target.value;
    //$('#accommodation_district').empty();
    $.getJSON('ajax_upazilla?district_name='+district_name,function(data){
	 //console.log(data);
	$('#accommodation_upazilla').empty();
	$('#accommodation_upazilla').append('<option value="'+"Any"+'">'+"Any"+'</option>');
	$.each(data ,function(index,upazilla_object){
	   
	   $('#accommodation_upazilla').append('<option value="'+upazilla_object.UPAZILLA_NAME+'">'+upazilla_object.UPAZILLA_NAME+'</option>');
	   
	});
	
    });
});
</script>
<!--script type="text/javascript">
$('#accommodation_division').on('change',function(e){
    $select = $('#accommodation_division');
//request the JSON data and parse into the select element
    $.ajax({
      url: 'ajax_district',
      dataType:'JSON',
      success:function(data){
	//clear the current content of the select
	//$select.html('');
	//iterate over the data and append a select option
	$.each(data, function(key, val){
	  $select.append('<option id="' + val.DISTRICT_NAME + '">' + val.DISTRICT_NAME + '</option>');
	})
      },
      error:function(){
      //if there is an error append a 'none available' option
      $select.html('<option id="-1">none available</option>');
    }
    });
});

</script-->


