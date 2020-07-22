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

            $sqlCheck = "select * from job where user_id=$user_id;";
            $result = mysqli_query($conn, $sqlCheck);
                $count = mysqli_num_rows($result);
                if (mysqli_num_rows($result) != 0)
                {
        
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $title = $row['title'];
                        $type = $row['type'];
                        $catagory = $row['catagory'];
                        $description = $row['description'];
                        $deadline = $row['deadline'];
                        $vacancy = $row['vacancy'];
                        $salary = $row['salary'];
                    }
                
                
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
                <a href="emp_search.php">Posted Jobs</a>
            </li>
        </ul>
    </nav>

    <div class="container">
    	<br>
            <h4>Welcome, <?php echo $c_name;  ?></h4>

            <div class="card mt-3">
    		<table class="card mt-3 ml-3 mr-3 mb-3 ">
                <tr>
                    <td><label>Job title:</label></td>
                    <td><label><?php echo $title; ?></label></td>
                </tr> 
                <tr>
                    <td><label>Job type:</label></td>
                    <td><label><?php echo $type; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Job catagory :</label></td>
                    <td><label><?php echo $catagory; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Job description:</label></td>
                    <td><label><?php echo $description; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Deadline:</label></td>
                    <td><label><?php echo $deadline; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Vacancy:</label></td>
                    <td><label><?php echo $vacancy; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Salary:</label></td>
                    <td><label><?php echo $salary; ; ?></label></td>
                </tr>           
            </table>
    	</div>       	
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
