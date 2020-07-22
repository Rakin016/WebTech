<?php 
	
    session_start();	
    include "includes/db_connect.inc.php";
	  if(!isset($_SESSION['user_id']))
	  {
	  	header("Location: logout.php");

	  }
    $user_id = $_SESSION['user_id'];
    $id = $username = $email = "";
    $sql = "select * from admin where user_id='$user_id';";
    
    
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['user_id'];
                $username = $row['username'];
                $email = $row['email'];
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
                <a href="admin.php">Home</a>
            </li>
            <li>
                <a href="adminApproval.php">User Approval</a>
            </li>
            <li>
                <a href="adminForum.php">Forum</a>
            </li>
        </ul>
    </nav>

    <div class="container">
    	
    <form align="right" method="post" action="logout.php">
            <label class="logoutLblPos"><input type="submit" value="log out"></label>
        </form>
            <h1>Welcome, Admin</h1>
            <p>Welcome to job portal. Here You can approve the new user accounts and get in touch with the Job-seekers by relpying their concerns in the forum.</p>
            <div class="image-wrapper">
            <img src="images/admin.jpg" alt="image">
            </div>    	
    </div>

</div>
</body>
</html>
<style type="text/css">
	<?php include 'CSS\admin.css'; ?>
</style>