<?php
session_start();
include('connection.php');



$userID = $_GET['userID']; 



$query = "DELETE FROM user WHERE userID = '$userID'";
$result = mysqli_query($conn,$query);

if(mysqli_query($conn,$query))
{
	echo "<script>alert('Delete user successfully');</script>";
    echo"<meta http-equiv='refresh' content='0; url=admin.php'/>";
}
else
{
	echo "Error deleting record: " . mysqli_error($conn);
}


?>
