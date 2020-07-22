<?php 
	
	  session_start();	
    include "includes/db_connect.inc.php";
    $sql = "select * from validation where validation='0'";
    $result = mysqli_query($conn, $sql);
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
            
        Pending User Approval List:
            <div >
              <br>
            	<table border="0" class="table table-striped">
            		<tr>
            			<th>Company Name</th>
            			<th>User Name </th>
            			<th>Email</th>
            			<th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";    
                  echo "<td>";                   
                    echo "<lablel> ".$row['c_name']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<lablel> ".$row['username']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<lablel> ".$row['email']." </label>";
                  echo "</td>";
                  echo "<td>"; 
                    echo "<button class="."btn btn-danger delete"." title="."Approve"." id=".$row['user_id']." onClick="."approve(".$row['user_id'].")".">Approve</button></td>";
                  echo "</td>";
                  echo "</tr>"; 
                }
              ?>
              </table>              
            </div>
    </div>

</div>
</body>
</html>

<style type="text/css">
	<?php include 'CSS\admin.css'; ?>
</style>

<script type="text/javascript">
	function approve(id)
	{
			$.ajax
                    (
                        {
                            url : 'approve.php',
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