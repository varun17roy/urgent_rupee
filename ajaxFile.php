<?php
//Include database configuration file
	include('includes/config.php');
	
if(isset($_POST["state_id"])){
	$state_id= $_POST['state_id'];
    //Get all city data

    //$stateid=substr($state_id, 0, 2);
    
 $query = "SELECT * FROM cities WHERE stateID = $state_id 
	ORDER BY cityName ASC";
    $run_query = mysqli_query($con, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display cities list
    if($count > 0){
        echo '<option value="">Select city</option>';
        while($row = mysqli_fetch_array($run_query)){
		$city_id=$row['cityID'];
		$city_name=$row['cityName'];
        // $ccname=$city_id.'_'.$city_name;
        // $citySeprates = explode('_',$ccname);
        // $cId= $citySeprates[0];
        // $cName= $citySeprates[1];
 

       
        echo "<option value='$city_name'>$city_name</option>";
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>