<?php 
	
	include "includes/db_connect.inc.php";	
    session_start();
    $error="";	
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}
    $user_id = $_SESSION['user_id'];
    $sql2 = "select * from js_details where user_id='$user_id';";
    
    
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2))
            {
                $id = $row['user_id'];
                $f_name = $row['f_name'];
                $email = $row['email'];
                $gender = $row['gender'];                

            }
    ////////////////////////
    $post = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!empty($_POST['post_field']))
        {
            $post = mysqli_real_escape_string($conn,$_POST['post_field']);   
            $post = $_POST['post_field'];
        }

        $sqlCheck = "select * from forum where post='$post' and user_id='$user_id';";
        $rowCount = mysqli_query($conn,$sqlCheck);
        if (mysqli_num_rows($rowCount) != 0)
        {
        
            $error = "Posted Already";
        }
        else
        {
        $sqlPost = "INSERT INTO `forum`(`user_id`, `post`, `comment`) VALUES ('$user_id','$post','');";
        
        mysqli_query($conn,$sqlPost);


        }
        
    }
    $resultPost = mysqli_query($conn, "SELECT * FROM forum where user_id='$user_id'; ");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<?php include 'includes/links.php'; ?>
	<?php include "includes/db_connect.inc.php"; ?>
</head>
<body>
<form action="forum.php" method="POST"> 
<div class="wrapper">
    
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
            <h2>Forum</h2>
            <h5>Post here to get reply from the Admin.</h5>         
            <div>
              <textarea 
                id="text" 
                cols="50" 
                rows="5" 
                name="post_field" 
                placeholder="Post your concerns..." required="required"></textarea>
            </div>
            <button class="btn btn-outline-success my-4 my-sm-0" type="submit">Post</button>
            <?php echo $error;  ?>
            
            <div >
              <?php
                while ($row = mysqli_fetch_array($resultPost)) {
                  echo "<div id='img_div' class="."card_2"."  >";
                   echo "<div id='img_div' class="."card_2"." >";
                    echo "<lablel> ".$row['post']." </label>";
                  echo "</div>";
                  ;
                    echo "<lablel> ".$row['comment']." </label>";
                    echo "<button id=".$row['id']." onClick="."deletePost(".$row['id'].")".">Delete</button>";
                  echo "</div>";
                }
              ?>              
            </div>

    	
    </div>

</div>
</form>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\emp_registration.css'; ?>
    .card_2 {
    margin: 5px;
    padding: 5px;
    position: relative;
    
    display: flex;
    
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: rgba(0,0,0,.075);;
    background-clip: border-box;
    border: 3px solid rgba(0,0,0,.125);
    border-radius: .30rem;
}
    
}
</style>

<script type="text/javascript">
    function deletePost(id)
            {
                
                    $.ajax
                    (
                        {
                            url : 'forumDelete.php',
                            type : 'GET',
                            data: 
                            {
                                id : id,
                            },
                            success : function(data)
                            {
                                   $(document).ready(function(){
                                        
                                        location.reload()
                                    });
                            },
                            error : function(XMLHttpRequest, textStatus, errorThrown) 
                            {
                                alert ("Error Occured");
                            }                                 
                        }
                    );
            }

</script>