<?php 
    include "includes/db_connect.inc.php";	
	session_start();	
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}
    $user_id = $_SESSION['user_id'];
    $degrees = $specialization = $experience= $skill = $oDegree ="";

    $sql = "select * from js_qualifications where user_id='$user_id';";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $degrees = $row['degrees'];
                $specialization = $row['specialization'];
                $experience = $row['experience'];
                $skill = $row['skill'];
                $oDegree = $row['oDegree'];

            }
            $sqlLogOut = "select * from js_details where user_id='$user_id';";   
    
            $resultLogOut = mysqli_query($conn, $sqlLogOut);
            while($row = mysqli_fetch_assoc($resultLogOut))
            {
                $user_id = $row['user_id'];
                $f_name = $row['f_name'];
                $email = $row['email'];
                $gender = $row['gender'];                 

            }

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {        
                
                $specialization = $_POST['specialization'];
                $degrees=implode(',', $_POST['degrees']);
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
                if(!empty($_POST['oDegree']))
                {
                    $oDegree = mysqli_real_escape_string($conn,$_POST['oDegree']);  
                    $oDegree = $_POST['oDegree'];
                }
        
                $sqlUpdate = "UPDATE `js_qualifications` SET `degrees`='$degrees',`specialization`='$specialization',`experience`='$experience',`skill`='$skill',`oDegree`='$oDegree' WHERE user_id='$user_id';";
                echo $sqlUpdate;
                mysqli_query($conn, $sqlUpdate);
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
<form action="editQualification.php" method="POST">
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
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="SSC" <?php if($degrees=="SSC"){echo "selected";} ?>>
                    <label for="degrees">SSC</label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="HSC" <?php if($degrees=="HSC"){echo "selected";} ?>>
                    <label for="degrees">HSC</label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="Honours" <?php if($degrees=="Honours"){echo "selected";} ?>>
                    <label for="degrees">Honours</label>
                    <input type="checkbox" class="foem-group ml-3 mt-3" id="degrees" name="degrees[]" value="Masters" <?php if($degrees=="Masters"){echo "selected";} ?>>
                    <label for="degrees">Master's</label>   
                    </div>                   
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Other Higher degrees(If any): </label>
                    <input class="form-control" type="text" name="oDegree" placeholder="Enter degrees" value=<?php echo $oDegree;  ?> > 
                    </div>
                </div>
            
                <div class="col-md-6 ml-3">
                    <div class="form-group">
                        <label>Specialization : </label>
                        <select name="specialization" class="foem-group ml-3 mt-3" required name="specialization" >
                            <option value="" disabled selected>Select one</option>
						    <option value="Engineer" <?php if($specialization=='Engineer'){echo "selected";} ?>>Engineer</option>
                            <option value="Architect" <?php if($specialization=='Architect'){echo "selected";} ?>>Architect</option>
                            <option value="Software" <?php if($specialization=='Software Development'){echo "selected";} ?>>Software Engineer</option>
                            <option value="Information" <?php if($specialization=='Information'){echo "selected";} ?>>Information Technology</option>
                            <option value="Telecommunication" <?php if($specialization=='Telecommunication'){echo "selected";} ?>>Telecommunication</option>
                            <option value="Medical" <?php if($specialization=='Medical'){echo "selected";} ?>>Medical/Pharma</option>
                            <option value="Education" <?php if($specialization=='Education'){echo "selected";} ?>>Education</option>
                            <option value="Accounting" <?php if($specialization=='Accounting'){echo "selected";} ?>>Accounting/Finance</option>
                            <option value="Garments" <?php if($specialization=='Garments'){echo "selected";} ?>>Garments/Textile</option>
                            <option value="Marketing" <?php if($specialization=='Marketing'){echo "selected";} ?>>Marketing/Sales</option>
                            <option value="Hospitality" <?php if($specialization=='Hospitality'){echo "selected";} ?>>Hospitality/Tourism</option>
                            <option value="Law" <?php if($specialization=='Law'){echo "selected";} ?>>Law/Legal</option>
                            <option value="Others" <?php if($specialization=='Others'){echo "selected";} ?>>Others</option>
                        </select>     
                    </div>             
                                                     
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Job experience: </label>
                    <input class="form-control" type="text" name="experience" placeholder="Enter job experience" value=<?php echo $experience;  ?> > 
                    </div>
                </div>
                <div class="col-md-6 ml-3" >
                    <div class="form-group">
                    <label class="">Professional Skills(If any): </label>
                    <input class="form-control" type="text" name="skill" placeholder="Enter skills" value=<?php echo $skill;  ?> > 
                    </div>
                </div>
    

            </div>
            
             <button align="middle" type="submit" class="btn btn-primary float-right mr-3" >Save</button>
                         
        </div>
    </div>
                    
</div>
</form>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
