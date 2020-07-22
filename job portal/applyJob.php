<?php 
	
    session_start();	
    include "includes/db_connect.inc.php";
	if(!isset($_SESSION['user_id']))
	{
		header("Location: logout.php");

	}
    $user_id = $_SESSION['user_id'];
    $id = $f_name = $email = $gender = $title = $type = $catagory = $description = $location = $deadline = $vacancy = $salary ="";
    $sql = "select * from js_details where user_id='$user_id'";
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
	<title>Confirmation</title>
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
    </nav>

    <div class="container">
    	
        <form align="right" method="post" action="jobSeeker_index.php">
            <label class="logoutLblPos"><input type="submit" value="Go back to Home"></label>
        </form>
        <h1>Congratulations!! <?php echo $f_name;  ?></h1>
        <div class="image-wrapper">
            <img src="images/applied.jpg" alt="image">
            </div>
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\apply.css'; ?>
</style>
