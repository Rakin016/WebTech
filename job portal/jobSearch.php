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
    ////////////////////////////
            $perPage = 3;
            $a = 1;
            $uf = $c_key = "";
          
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
              $perPage = $_POST['numOfRec'];
              $_SESSION['per_page'] = $perPage;
            }
          
            if($_SERVER["REQUEST_METHOD"]=="GET"){
          
              if(isset($_GET['filter'])){
                if(!empty($_GET['userFilter'])){
                  $uf = $_GET['userFilter'];
                }
          
                if(!empty($_GET['cmntKeyword'])){
                  $c_key = $_GET['cmntKeyword'];
                }
              }
              
              if(isset($_SESSION['per_page'])){
                $perPage = $_SESSION['per_page'];
              }
          
              if(!empty($_GET['x'])){
                $a = $_GET['x'];
              }
            }
          
            $startingRow = ($a-1)*$perPage;
          
            if(isset($_GET['filter']) &&  !empty($_GET['userFilter']) && empty($_GET['cmntKeyword'])) {
                $jobsQuery = "select * from job where catagory like '$uf' limit $startingRow, $perPage";
            }
            else if(isset($_GET['filter']) &&  empty($_GET['userFilter']) && !empty($_GET['cmntKeyword'])){
                $jobsQuery = "select * from job where title like '%$c_key%' limit $startingRow, $perPage";
            }
            else if(isset($_GET['filter']) &&  !empty($_GET['userFilter']) && !empty($_GET['cmntKeyword'])){
                $jobsQuery = "select * from job where catagory like '$uf' and title like '%$c_key%' limit $startingRow, $perPage";
            }
            else{
                $jobsQuery = "select * from job limit $startingRow, $perPage";
            }
          
            $resultJobs = mysqli_query($conn, $jobsQuery);
          
            $totalJobsQuery = "SELECT COUNT(*) as t_c FROM job";
            $resultTotalJobs = mysqli_query($conn, $totalJobsQuery);
            $rowTotalJobs = mysqli_fetch_assoc($resultTotalJobs);
            $tC = $rowTotalJobs['t_c'];
          
            $np = ceil($tC/$perPage);
          
            $allUsers = "select id,catagory,type from job";
            $resultAllUsers = mysqli_query($conn, $allUsers);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Job Search</title>
	<?php include 'includes/links.php'; ?>
	<?php include "includes/db_connect.inc.php"; ?>
    <style>
      body{
        background-color: #ffffff
      }
     


    </style>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>

  $(document).ready(function(){
      var i = 3;
  var j = 0;

  $('#searchBox').on('keyup',function(){
    $('#jobs').load('nextPost.php',{searchVal: document.getElementById('searchBox').value});
  })

  $('#prevBtn').click(function(){
    j = j - 3;
         $('#jobs').load('nextPost.php',{startingVal: j});
      });

  $('#nextBtn').click(function(){
    j = j + 3;
         $('#jobs').load('nextPost.php',{startingVal: j});
      });

  });

</script>
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
    	   <br>

        <form class="" action="jobSearch.php" method="post">
            <label>Number of records: </label>
            <select name="numOfRec">
            <option value="3" <?php if ($perPage == "3") echo "selected"; ?> >3</option>
            <option value="5" <?php if ($perPage == "5") echo "selected"; ?> >5</option>
            <option value="7" <?php if ($perPage == "7") echo "selected"; ?> >7</option>
            <option value="10" <?php if ($perPage == "10") echo "selected"; ?> >10</option>
            </select>
            &nbsp;&nbsp;
            <input type="submit" name="showRec" value="Show">
        </form>

        <form action="jobSearch.php" method="get">
            <fieldset>
            <legend>Filter & Search</legend>
            <label>Available catagories: </label>
            <select name="userFilter">
            <option value="" disabled selected>Catagories</option>
            <?php
            while($rowAllUsers = mysqli_fetch_assoc($resultAllUsers)) { ?>
              <option value="<?php echo $rowAllUsers['catagory']; ?>"> <?php echo $rowAllUsers['catagory']; ?> </option>
            <?php
                }
            ?>
        </select>
        &nbsp;&nbsp;
        <input type="text" name="search" id="searchBox" value="" placeholder="Search by catagory..">
        </fieldset>
        </form>
        <br>

        <div id="jobs">
        <h5><b>Available Jobs:</b></h5>
		<?php
			while($row = mysqli_fetch_assoc($resultJobs)){
				echo "<b>".$row['catagory'].": </b>".$row['title']. " (".$row['type']. ")<br><br><b><a href=applyJob.php> Apply Now!</a></b><br><br>";
			}

		?>
    </div>
    <button class="btnpg" type="button" name="btnPrev" id="prevBtn">Previous</button>
	<button class="btnpg" type="button" name="btnNext" id="nextBtn">Next</button>


</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
</style>
