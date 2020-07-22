<?php 
	
    session_start();	
    include "includes/db_connect.inc.php";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: logout.php");

	}
    $user_id = $_SESSION['user_id'];
    $id = $c_name = $email = $phone = "";
    $sql2 = "select * from employer_details where user_id='$user_id';";
    //echo $sql;
    
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2))
            {
                $id = $row['user_id'];
                $c_name = $row['c_name'];
                $email = $row['email'];
                $phone = $row['phone'];                

            
            }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Posted Jobs</title>
	<?php include 'includes/links.php'; ?>
	<?php include "includes/db_connect.inc.php"; ?>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Job Portal</h3>
        </div>
        <ul class="list-unstyled components">
             <li>
                <a href="employer_index.php">Home</a>
            </li>
            <li>
                <a href="job_posting.php">Post Job</a>
            </li>
            <li>
                <a href="show_jobs.php">Posted Jobs</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <br>
        <br>
            <h2>No jobs posted yet!</h2>      
        	
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
