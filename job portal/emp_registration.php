<?php 

include "includes/db_connect.inc.php";

$c_name = $address = $email = $phone = $username = $user_password = $user_type = $usernameInDatabase = $err = $row = $inserSqlUserDetails = $userPassToDB = $newID ="";


    if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(!empty($_POST['c_name']))
		{
			$c_name = mysqli_real_escape_string($conn,$_POST['c_name']);    
			$c_name = $_POST['c_name'];
        }
        if(!empty($_POST['address']))
		{
			$address = mysqli_real_escape_string($conn,$_POST['address']);    
			$address = $_POST['address'];
        }
        if(!empty($_POST['email']))
		{
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$email = $_POST['email'];
        }	
        if(!empty($_POST['phone']))
		{
			$phone = mysqli_real_escape_string($conn,$_POST['phone']);
			$phone = $_POST['phone'];
        }
        if(!empty($_POST['username']))
		{
			$username = mysqli_real_escape_string($conn,$_POST['username']);
			$username = $_POST['username'];
        }	
		if(!empty($_POST['user_password']))
		{
			$user_password = mysqli_real_escape_string($conn,$_POST['user_password']);
			$user_password = $_POST['user_password'];
			$userPassToDB = password_hash($user_password, PASSWORD_DEFAULT);
		}
		if(isset($_POST['user_type']))
		{
			$user_type = mysqli_real_escape_string($conn,$_POST['user_type']);
			$user_type = $_POST['user_type'];
		}

		$sqlUserDtailCheck = "select * from employer_details where username = '$username';";
		
        
		$resultUserDetail = mysqli_query($conn, $sqlUserDtailCheck);
		$count = mysqli_num_rows($resultUserDetail);
		if (mysqli_num_rows($resultUserDetail) != 0)
		{
			header("Location: emp_registration.php");
		
		}
		else 
		{
			$inserSqlUserDetails = "INSERT INTO employer_details( c_name, address, email, phone, username, user_password, user_type) VALUES ('$c_name','$address','$email','$phone','$username','$userPassToDB','$user_type') ;";
			mysqli_query($conn, $inserSqlUserDetails);
			$getIDSql = "select user_id from employer_details where username='$username';";
			$getIDresult = mysqli_query($conn, $getIDSql);
			while($row = mysqli_fetch_assoc($getIDresult))
			{
				$newID = $row['user_id'];
			}

			$insertUsersSql = "INSERT INTO `employer`( `user_id`, `username`, `user_password`, `user_type`) VALUES ($newID,'$username','$userPassToDB','$user_type');";

			//echo $insertUsersSql;
			mysqli_query($conn, $insertUsersSql);

			$insertValidation = "INSERT INTO `validation`(`user_id`, `email`, `username`, `c_name`, `validation`) VALUES ('$newID','$email','$username','$c_name','0')";
			echo $insertValidation;
			mysqli_query($conn, $insertValidation);

			header("Location: login.php");
        }
	}
?>

<html>
<head>
	<?php include 'includes/links.php'; ?>
	<title>
		Job Portal
	</title>
</head>

<body class="body-bg">
	<form action="emp_registration.php" method="POST">
		<div class="container login-container">
			<div class="card p-2 login-card">
				<div class="card-head">
					<h3>Company Registration</h3>
				</div>
				<div class="card-body">
					<div class="form-group">
				    	<label for="c_name">Name</label>
				    	<input type="text" class="form-control" id="c_name" name='c_name' placeholder="Enter Company name" required>				    	
                    </div>
                    <div class="form-group">
				    	<label for="address">Address</label>
				    	<textarea cols="4" rows="4" class="form-control" id="address" name='address' placeholder="Enter address" required></textarea>				    	
				    </div>
					<div class="form-group">
				    	<label for="email">Email address</label>
				    	<input type="email" class="form-control" id="email" name='email'  placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
				    	<label for="phone">Phone No.</label>
				    	<input type="text" class="form-control" id="phone" name='phone' placeholder="Enter phone no." required>				    	
                    </div>
                    <div class="form-group">
				    	<label for="username">Username</label>
				    	<input type="text" class="form-control" id="username" name='username' placeholder="Enter username" required>				    	
				    </div>
				    <div class="form-group">
				    	<label for="user_password">Password</label>
				    	<input type="password" class="form-control" id="user_password" name='user_password' placeholder="Enter Password" required>
				    </div>

				    <div class="row">
					    <div class="col-md-4 form-group">
					    	User Type:
						    <div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="user_type_employer" name="user_type" value="employer">
							  <label class="custom-control-label" for="user_type_employer">Employer</label>
							</div>

							<!-- Default checked -->
							<div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="user_type_job_seeker" name="user_type" value="job_seeker">
							  <label class="custom-control-label" for="user_type_job_seeker">Job-seeker</label>
							</div>
					    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="reset" class="btn btn-primary"> Reset</button>
					<span><b>Or<a href="home.php"> Go back to Home page</a></b></span>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>