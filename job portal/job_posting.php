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

$title = $type = $catagory = $description = $location = $deadline = $vacancy = $salary = $err = $row ="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(!empty($_POST['c_name']))
		if(!empty($_POST['title']))
		{
			$title = mysqli_real_escape_string($conn,$_POST['title']);    
			$title = $_POST['title'];
		}
		if(!empty($_POST['type']))
		{
			$type = mysqli_real_escape_string($conn,$_POST['type']);    
			$type = $_POST['type'];
		}
		if(!empty($_POST['catagory']))
		{
			$catagory = mysqli_real_escape_string($conn,$_POST['catagory']);    
			$catagory = $_POST['catagory'];
		}
		if(!empty($_POST['description']))
		{
			$description = mysqli_real_escape_string($conn,$_POST['description']);    
			$description = $_POST['description'];
		}
        if(!empty($_POST['location']))
		{
			$location = mysqli_real_escape_string($conn,$_POST['location']);    
			$location = $_POST['location'];
        }
        if(!empty($_POST['deadline']))
		{
			$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);
			$deadline = $_POST['deadline'];
        }	
        if(!empty($_POST['vacancy']))
		{
			$vacancy = mysqli_real_escape_string($conn,$_POST['vacancy']);
			$vacancy = $_POST['vacancy'];
        }
        if(!empty($_POST['salary']))
		{
			$salary = mysqli_real_escape_string($conn,$_POST['salary']);
			$salary = $_POST['salary'];
        }

		$getIDSql = "select user_id from employer_details where username='$username';";
			$getIDresult = mysqli_query($conn, $getIDSql);
			while($row = mysqli_fetch_assoc($getIDresult))
			{
				$newID = $row['user_id'];
			}
        $sql = "INSERT INTO job ( user_id, title, type, catagory, description, location, deadline, vacancy, salary)
                  VALUES ('$newID','$title','$type','$catagory','$description','$location','$deadline','$vacancy','$salary');";
    
        mysqli_query($conn, $sql);
        header("Location: employer_index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/links.php'; ?>
	<title>
		Job Posting
	</title>
</head>

<body class="body-bg">
	<form action="job_posting.php" method="POST">
		<div class="container login-container">
			<div class="card p-2 login-card">
				<div class="card-head">
					<h3>Job Posting</h3>
				</div>
					<div class="form-group">
				    	<label for="title">Job Title:</label>
				    	<input type="text" class="form-control" id="title" name='title' placeholder="Enter job title" required>				    	
                    </div>
                    <div "form-group">
						Job Type (Choose one):
						    <div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="type_part" name="type" value="part time">
							  <label class="custom-control-label" for="type_part">Part Time</label>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" class="custom-control-input" id="type_full" name="type" value="full time">
							  <label class="custom-control-label" for="type_full">Full Time</label>
							</div>
                    <div class="form-group">
				    	<label for="catagory">Job Catagory:</label>
                        <select name="catagory" class="form-control" id="catagory" name='catagory' required>
                                <option value="" disabled selected>Select one</option>
						        <option value="Engineer">Engineer</option>
                                <option value="Architect">Architect</option>
                                <option value="Software">Software Engineer</option>
                                <option value="Information">Information Technology</option>
                                <option value="Telecommunication">Telecommunication</option>
                                <option value="Medical">Medical/Pharma</option>
                                <option value="Education">Education</option>
                                <option value="Accounting">Accounting/Finance</option>
                                <option value="Garments">Garments/Textile</option>
                                <option value="Marketing">Marketing/Sales</option>
                                <option value="Hospitality">Hospitality/Tourism</option>
                                <option value="Law">Law/Legal</option>
                                <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
				    	<label for="description">Job Description:</label>
				    	<textarea cols="4" rows="4" class="form-control" id="description" name='description' placeholder="Enter job description" required></textarea>				    	
                    </div>
                    <div class="form-group">
				    	<label for="location">Job Location:</label>
				    	<input type="text" class="form-control" id="location" name='location' placeholder="Enter location" required>				    	
                    </div>
                    <div class="form-group">
				    	<label for="deadline">Deadline:</label>
				    	<input type="date" class="form-control" id="deadline" name='deadline' required>				    	
                    </div>
                    <div class="form-group">
				    	<label for="vacancy">Vacancy:</label>
				    	<input type="number" min="0" step="1" class="form-control" id="vacancy" name='vacancy' placeholder="Enter vacancy" required>				    	
                    </div>
                    <div class="form-group">
				    	<label for="salary">Salary:</label>
				    	<input type="text" class="form-control" id="salary" name='salary' placeholder="Enter salary" required>				    	
                    </div>
					<button type="submit" class="btn btn-primary">Post Job</button>
                    <button type="reset" class="btn btn-primary"> Reset</button>
					<span><b>Or<a href="employer_index.php"> Go back to Home</a></b></span>
				</div>
			</div>
		</div>
	</form>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\job_posting.css'; ?>
</style>