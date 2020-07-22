<?php 
    include "includes/db_connect.inc.php";	
	session_start();	
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}
    $user_id = $_SESSION['user_id'];
    $sql2 = "select * from js_details where user_id='$user_id';";
    //echo $sql;
    
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2))
            {
                $id = $row['user_id'];
                $f_name = $row['f_name'];
                $email = $row['email'];
                $gender = $row['gender'];                

            }

    $sqlCheck = "select * from js_qualifications where user_id=$user_id;";
    $result = mysqli_query($conn, $sqlCheck);
        $count = mysqli_num_rows($result);
        if (mysqli_num_rows($result) != 0)
        {

            while($row = mysqli_fetch_assoc($result))
            {
                $degrees = $row['degrees'];
                $specialization = $row['specialization'];
                $experience = $row['experience'];
                $skill = $row['skill'];
                $oDegree = $row['oDegree'];
            }
        
        
        }
        else 
        {
            header("Location: qualificationInfo.php");
        }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Qualification</title>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow ">
              <div class="container">
                <a class="navbar-brand" href="#">Welcome, <?php echo $f_name;  ?></a>               
                      
                    
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="logout.php">Logout
                            <span class="sr-only">(current)</span>
                          </a>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </nav>
    	<div class="card mt-3">
    		<table class="card mt-3 ml-3 mr-3 mb-3 ">
                <tr>
                    <td><label>Completed degrees:</label></td>
                    <td><label><?php echo $degrees; ?></label></td>
                </tr> 
                <tr>
                    <td><label>Other Higher degrees(If any):</label></td>
                    <td><label><?php echo $oDegree; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Specialization :</label></td>
                    <td><label><?php echo $specialization; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Job experience:</label></td>
                    <td><label><?php echo $experience; ; ?></label></td>
                </tr>
                <tr>
                    <td><label>Professional Skills(If any):</label></td>
                    <td><label><?php echo $skill; ; ?></label></td>
                </tr>  
                   
                <tr>
                    <td colspan="2" align="middle">
                        <button align="middle" type="submit" class="btn btn-primary" onClick="redirectTo()">Edit</button>
                    </td>
                <tr>       
            </table>
    	</div>
    </div>

</div>

</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>

<script type="text/javascript">
    function redirectTo()
    {
        window.location.replace('editQualification.php');
    }
</script>
