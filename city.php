<?php
include('includes/config_db.php');
$query = "SELECT * FROM city WHERE city != 'Other' AND status = '1' ORDER BY city ASC";
$run_query = mysqli_query($con, $query);
$count = mysqli_num_rows($run_query);
if ($count > 0) {
    echo '<option value="">Select City</option>';
    while ($row = mysqli_fetch_array($run_query)) {
        $state_id = $row['state_id'];
        $cityval = $state_id . '_' . $row['city'];
        $city =  $row['city'];
        echo "<option value='$cityval' data-val='$state_id'>$city</option>";
    }
} else {
    echo '<option value="">City not available</option>';
}
