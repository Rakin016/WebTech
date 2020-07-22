<?php 
session_start();
include "includes/db_connect.inc.php";

$f_name = $gender = $dob = $b_group = $address = $email = $phone = $username = $user_password = $user_type = $usernameInDatabase = $err = $row = $inserSqlUserDetails = $userPassToDB = $newID ="";


    if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(!empty($_POST['f_name']))
		{
			$f_name = mysqli_real_escape_string($conn,$_POST['f_name']);    
			$f_name = $_POST['f_name'];
		}
		if(!empty($_POST['gender']))
		{
			$gender = mysqli_real_escape_string($conn,$_POST['gender']);    
			$gender = $_POST['gender'];
		}
		if(!empty($_POST['dob']))
		{
			$dob = mysqli_real_escape_string($conn,$_POST['dob']);    
			$dob = $_POST['dob'];
		}
		if(!empty($_POST['b_group']))
		{
			$b_group = mysqli_real_escape_string($conn,$_POST['b_group']);    
			$b_group = $_POST['b_group'];
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

		$sqlUserDtailCheck = "select * from js_details where username = '$username';";
		
        $result = mysqli_query($conn, $sqlUserCheck);
		$resultUserDetail = mysqli_query($conn, $sqlUserDtailCheck);
		$count = mysqli_num_rows($resultUserDetail);
		if (mysqli_num_rows($resultUserDetail) != 0)
		{
			header("Location: js_registration.php");
		
		}
		else 
		{
			$inserSqlUserDetails = "INSERT INTO js_details( f_name, gender, dob, b_group, address, email, phone, username, user_password, user_type) VALUES ('$f_name','$gender','$dob','$b_group','$address','$email','$phone','$username','$userPassToDB','$user_type') ;";
			mysqli_query($conn, $inserSqlUserDetails);
			$getIDSql = "select user_id from js_details where username='$username';";
			$getIDresult = mysqli_query($conn, $getIDSql);
			while($row = mysqli_fetch_assoc($getIDresult))
			{
				$newID = $row['user_id'];
			}

			$insertUsersSql = "INSERT INTO `job_seeker`( `user_id`, `username`, `user_password`, `user_type`) VALUES ($newID,'$username','$userPassToDB','$user_type');";

			//echo $insertUsersSql;
			mysqli_query($conn, $insertUsersSql);
			header("Location: login.php");
        }
	}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/links.php'; ?>
	<title>
		Job Portal-Registration
	</title>
</head>

<body class="body-bg">
	<form action="js_registration.php" method="POST">
		<div class="container login-container">
			<div class="card p-2 login-card">
				<div class="card-head">
					<h3>Job-seeker Registration</h3>
				</div>
				<div class="card-body">
					<div class="form-group">
				    	<label for="f_name">Full Name</label>
				    	<input type="text" class="form-control" id="f_name" name='f_name' placeholder="Enter full name" required>				    	
                    </div>
                    <div "form-group">
						Gender (Choose one):
						    <div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="gender_male" name="gender" value="male">
							  <label class="custom-control-label" for="gender_male">Male</label>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="gender_female" name="gender" value="female">
							  <label class="custom-control-label" for="gender_female">Female</label>
							</div>		
                    </div>
                    <div class="form-group">
				    	<label for="dob">Date of birth</label>
				    	<input type="date" class="form-control" id="dob" name='dob' required>				    	
                    </div>
                    <div class="form-group">
				    	<label for="b_group">Blood Group</label>
                        <select name="b_group" class="form-control" id="b_group" name='b_group' required>
                                <option value="" disabled selected>Select one</option>
						        <option value="A+">A+</option>
						        <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">A-</option>
                                <option value="O+">B+</option>
                                <option value="O-">A-</option>
                                <option value="AB+">B+</option>
                                <option value="AB-">A-</option>
                        </select>
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
	<?php include 'CSS\js_registration.css'; ?>
</style>