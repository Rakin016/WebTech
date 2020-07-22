<?php 
	
    session_start();	
    include "includes/db_connect.inc.php";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: logout.php");

	}
    $user_id = $_SESSION['user_id'];
    $id = $c_name = $email = $phone = "";
    $sql = "select * from employer_details where user_id='$user_id';";
    //echo $sql;
    
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['user_id'];
                $c_name = $row['c_name'];
                $email = $row['email'];
                $phone = $row['phone'];                

            }
    $sqlValidation = "SELECT * FROM validation WHERE user_id = '$user_id';";	 
	$resultValidation = mysqli_query($conn, $sqlValidation);
	while($row = mysqli_fetch_assoc($resultValidation))
            {
                $validate = $row['validation'];                             

            }
    if($validate=='1')
    {
    	//header("Location: employer_index.php");
    }
    else
    {
    	 header("Location: invalidUser.php");   	
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
    	
        <form align="right" method="post" action="logout.php">
            <label class="logoutLblPos"><input type="submit" value="log out"></label>
        </form>
            <h1>Welcome, <?php echo $c_name;  ?></h1>
            <p>Welcome to job portal. We hope you will find the best employees suitable for your offered job in this website. You can post jobs and search for eligible employees.</p>
            <div class="image-wrapper">
            <img src="images/1.jpg" alt="image">
            </div>
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
