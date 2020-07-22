<?php 	
    include "includes/db_connect.inc.php";
    session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: logout.php");

	}
    $user_id = $_SESSION['user_id'];

    $degrees = $specialization = $experience= $skill = $oDegree = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {    
        $degrees=implode(',', $_POST['degrees']);

        if(!empty($_POST['oDegree']))
        {
            $oDegree = mysqli_real_escape_string($conn,$_POST['oDegree']);  
            $oDegree = $_POST['oDegree'];
        }

        $specialization = $_POST['specialization'];

        if(!empty($_POST['experience']))
        {
            $experience = mysqli_real_escape_string($conn,$_POST['experience']);  
            $experience = $_POST['experience'];
        }
        if(!empty($_POST['skill']))
        {
            $skill = mysqli_real_escape_string($conn,$_POST['skill']);  
            $skill = $_POST['skill'];
        }
        
        $sql = "INSERT INTO `js_qualifications`(`user_id`, `degrees`, `oDegree`, `specialization`, `experience`, `skill`) VALUES ('$user_id','$degrees','$specialization','$experience','$skill',`$oDegree`);";
        //echo $sql;
        mysqli_query($conn, $sql);
        header("Location: jobSeeker_index.php");

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
<form action="qualificationInfo.php" method="POST">
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
    	<div class="info-card">
            <div class="row">
                <div class="col-md-6 ml-3">
                <div class="form-group">
                    <label>Completed degrees: </label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" required id="degrees" name="degrees[]" value="SSC">
                    <label for="degrees">SSC</label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="HSC">
                    <label for="degrees">HSC</label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="Honours">
                    <label for="degrees">Honours</label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="Master's">
                    <label for="degrees">Master's</label>  
                    </div>                   
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Other Higher degrees(If any): </label>
                    <input class="form-control" type="text" name="oDegree" placeholder="Enter degrees" > 
                    </div>
                </div>
                <div class="col-md-6 ml-3">
                    <div class="form-group">
                        <label>Specialization : </label>
                        <select name="specialization" class="foem-group ml-3 mt-3" required name="specialization" >
                            <option value="" disabled selected>Select one</option>
						    <option value="Engineer">Engineer</option>
                            <option value="Architect">Architect</option>
                            <option value="Software Development">Software Engineer</option>
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
                                                     
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Job experience: </label>
                    <input class="form-control" type="text" name="experience" required placeholder="Enter job experience" > 
                    </div>
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Professional Skills(If any): </label>
                    <input class="form-control" type="text" name="skill" placeholder="Enter skills" > 
                    </div>
                </div>

                 
            </div>
            <button align="middle" type="submit" class="btn btn-primary float-right mr-3" >Save Information</button>     

        </div>
    </div>
                    
</div>
</form>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
