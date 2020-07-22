<?php
session_start();
include "includes/db_connect.inc.php";

$username = $user_password = $message = $user_id = $user_type="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	if(!empty($_POST['username'])){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$username= $_POST['username'];

	}
	if(!empty($_POST['user_password'])){
		$user_password = mysqli_real_escape_string($conn, $_POST['username']);
		$user_password= $_POST['user_password'];
	}
	
	$sqlUserCheck = "SELECT username, user_password,user_id,user_type FROM admin UNION SELECT username, user_password,user_id,user_type FROM employer UNION
					SELECT username, user_password,user_id,user_type FROM job_seeker WHERE username = '$username';";
	
	$result = mysqli_query($conn, $sqlUserCheck);
	$rowCount = mysqli_num_rows($result);

	if($rowCount < 1){
		$message = "User does not exist!";
	}
	else{
		while($row = mysqli_fetch_assoc($result)){
			$uPassInDB = $row['user_password'];
			$user_id = $row['user_id'] ;
			$user_type = $row['user_type'] ;
			if($username=='admin' && $user_password=='admin')
			{
				$_SESSION['user_id'] = $user_id;
				header("Location: admin.php");
			}
			if(password_verify($_POST['user_password'], $uPassInDB) && $user_type=='employer')
			{
				$message = "Success";
				$_SESSION['user_id'] = $user_id;
				header("Location: employer_index.php");
			}
			if(password_verify($_POST['user_password'], $uPassInDB) && $user_type=='job_seeker')
			{
				$message = "Success";
				$_SESSION['user_id'] = $user_id;
				header("Location: jobSeeker_index.php");
			}
			 
			else
			{
				$message = "Wrong Password!";
			}
		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/links.php'; ?>
	<title>
		Job Portal
	</title>
</head>

<body class="body-bg">
	<form action="login.php" method="post">
		<div class="container login-container">
			<div class="card p-2 login-card">
				<div class="card-head">
					<h3><b>Sign In</b></h3>
				</div>
				<div class="card-body">
					<div class="form-group">
				    	<label for="exampleInputId">Username</label>
              			<input type="text" class="form-control" id="exampleInputId" placeholder="Enter username" name="username">
				    </div>
				    <div class="form-group">
				    	<label for="exampleInputPassword1">Password</label>
				    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="user_password">
				    </div>
				    <span style="color:red"><?php echo $message; ?></span><br>
					<button type="submit" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-primary"> Reset</button>				    
          			<span><b>Or<a href="home.php"> Go back to Home page</a></b></span>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\login.css'; ?>
</style>