<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $contactNo = $_POST["contactNo"];
  $birthday = $_POST["birthday"];
  $gender = $_POST["gender"];
  $remark = $_POST["remark"];
	
  $insert_image = $_FILES['image']['name'];
  $insert_image_size = $_FILES['image']['size'];
  $insert_image_tmp_name = $_FILES['image']['tmp_name'];
	
  	if(!empty($insert_image))
	{
     	if($insert_image_size > 160000)
	 	{
          echo "<script>alert('Image is too big');</script>";
          echo "<script>window.location.href ='index.php'</script>";
     	}
		else
		{
			$image = addslashes(file_get_contents($insert_image_tmp_name)); 
			
			$query = "INSERT INTO user(username, email, contactNo, gender, birthday,remark, photo) VALUES ('$username', '$email', '$contactNo',  '$gender', '$birthday', '$remark', '$image' )";

			$res = mysqli_query($conn,$query);

			if($res)
			{
				echo "<script>alert('Comment successfully');</script>";
    			echo"<meta http-equiv='refresh' content='0; url=index.php'/>";
			}
			else
			{
				echo "Failed: " .mysqli_error($conn);
			}
		}	
	}
} 
?>
