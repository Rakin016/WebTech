<?php 
	
    session_start();	
    include "includes/db_connect.inc.php";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: logout.php");

	}
    $user_id = $_SESSION['user_id'];
    $id = $f_name = $email = $gender = "";
    $sql = "select * from js_details where user_id='$user_id';";
    //echo $sql;
    
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['user_id'];
                $f_name = $row['f_name'];
                $email = $row['email'];
                $gender = $row['gender'];                

            }
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
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
                <a href="jobSeeker_index.php">Home</a>
            </li>
            <li>
                <a href="js_qualification.php">Qualification Details</a>
            </li>
            <li>
                <a href="jobSearch.php">Job Search</a>
            </li>
            <li>
                <a href="forum.php">Forum</a>
            </li>
        </ul>
    </nav>

    <div class="container">
    	
        <form align="right" method="post" action="logout.php">
            <label class="logoutLblPos"><input type="submit" value="log out"></label>
        </form>
            <h1>Welcome, <?php echo $f_name;  ?></h1>
            <p>Welcome to job portal. We hope you will find your suitable job opportunities in this website. You can search for jobs and apply for them if you are eligible. You can also post your concerns to the forum to get solutions and interact with the admin.</p>
            <div class="image-wrapper">
            <img src="images/job1.jpg" alt="image">
            </div>
    </div>

</div>
</body>
</html>
<style>

.logoutLblPos{
  
}
</style>
<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
