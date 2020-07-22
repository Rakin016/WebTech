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
    </nav>

    <div class="container">
    	
    <form align="right" method="post" action="logout.php">
            <label class="logoutLblPos"><input type="submit" value="log out"></label>
        </form>
            <h1>Welcome, <?php echo $c_name;  ?></h1>
            <br>
            <h2>Registration validation is pending. </h2>
            
    	
    </div>

</div>
</body>
</html>

<style>
    h2 {
    color: red;
}
</style>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
