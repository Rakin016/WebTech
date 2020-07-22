<?php 
	
    session_start();	
    include "includes/db_connect.inc.php";
    $error="";
	  if(!isset($_SESSION['user_id']))
	  {
	  	header("Location: logout.php");

	  }
    $user_id = $_SESSION['user_id'];
    $id = $username = $email = "";
    $sql = "select * from admin where user_id='$user_id';";
    //echo $sql;
    
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['user_id'];
                $username = $row['username'];
                $email = $row['email'];
            }


    $post = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        
    }
    $resultPost = mysqli_query($conn, "SELECT * FROM forum where comment='' ; ");
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
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
                <a href="admin.php">Home</a>
            </li>
            <li>
                <a href="adminApproval.php">User Approval</a>
            </li>
            <li>
                <a href="adminForum.php">Forum</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        

            <br>
            <h2>Forum</h2>
            <h5>Kindly reply on posts which appears here.</h5>         
            <div>          
            
            <!-- Forum Div is Created here -->
            <div >
              <?php
                while ($row = mysqli_fetch_array($resultPost)) {
                  echo "<div id='img_div' class="."card_2"."  >";
                   echo "<div id='img_div' class="."card_2"." >";
                    echo "<lablel> ".$row['post']." </label>";
                  echo "</div>";
                  ;
                    echo "<div><textarea  cols="."40"." rows="."4"." name="."post_field"." placeholder="."Comment"." id=".$row['id']."></textarea><div>";
                    echo "<button id=".$row['id']." onClick="."replyPost(".$row['id'].")".">Reply</button>";
                    echo "<button id=".$row['id']." onClick="."deletePost(".$row['id'].")".">Delete</button>";
                  echo "</div>";



                }
              ?>              
            </div>

            <!-- Forum Div is Ended here -->
    </div>

</div>

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
                alert(id);
                console.log(id);
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
    function replyPost(id)
    {
        
        var x = document.getElementById(id);
        var comment = x.value;
        

        $.ajax
                    (
                        {
                            url : 'forumReply.php',
                            type : 'GET',
                            data: 
                            {
                                id : id,
                                comment : comment,
                            },
                            success : function(data)
                            {
                                   $(document).ready(function(){
                                        
                                        location.reload();
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