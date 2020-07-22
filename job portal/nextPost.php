<?php

include "includes/db_connect.inc.php";

if(isset($_POST['limitVal'])){
	$lv = $_POST['limitVal'];
	$jobsQuery = "select * from job limit $lv";
	$resultJobs = mysqli_query($conn, $jobsQuery);
}

else if(isset($_POST['searchVal'])) {
	$sv = $_POST['searchVal'];
	$jobsQuery = "select * from job where catagory like '%$sv%'";
	$resultJobs = mysqli_query($conn, $jobsQuery);
}

else if(isset($_POST['startingVal'])){
	$stv = $_POST['startingVal'];
	$jobsQuery = "select * from job limit $stv, 3";
	$resultJobs = mysqli_query($conn, $jobsQuery);
}

while($row = mysqli_fetch_assoc($resultJobs)){
	echo "<b>".$row['catagory'].": </b>".$row['title']. " (".$row['type']. ")  <br><br><b><a href=applyJob.php> Apply Now!</a></b><br><br>";
}

?>
