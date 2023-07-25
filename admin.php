<?php
include("connection.php");

$sql = "SELECT * FROM user;";
$result =  $conn->query($sql);
$result1 = mysqli_query($conn,$sql);
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" type="image/png" href="img/path-removebg-preview.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>


<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-md-6">
        <h4>Tan Le Qie</h4>
        <h5>Bachelor of Computer Science (Database Management) UTeM</h5>
        <h5>Gender: Female<span style="margin-left: 50px;">Birthday: 2000-04-02</span></h5>
        <h5>Email: <a href="mailto:tanleqie@gmail.com" style="color: antiquewhite">tanleqie@gmail.com</a></h5>
		<h5>Contact No: 019-5050053</h5>
        <h5>“You only live once, but if you do it right, once is enough.” ― Mae West</h5>
      </div>
      <div class="col-md-6 d-flex justify-content-center align-items-center">
        <div style="width: 260px; height: 260px; border-radius: 50%; overflow: hidden;">
          <img src="img/11.jpg" alt="Your Photo" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
      </div>
    </div>
  </div>
</section>


  <main id="main">	
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Comment</h2>
          <p>You can upload your comment here</p>
        </div>
	  
        <div class="row">
			<?php
	  		while($row = mysqli_fetch_assoc($result))
	  		{
				$gender = $row['gender'];
				$username = $row['username'];

				if ($gender == "Female") {
    				$iconClass = "fa-solid fa-venus";
    				$iconColor = "#ff80ac";
				} elseif ($gender == "Male") {
    				$iconClass = "fa-solid fa-mars";
    				$iconColor = "#669eff";
				} 
	  		?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" style="margin-bottom: 20px;">
            <div class="member">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['photo']).'" />'; ?>
              <h4><?php if ($iconClass): ?>
        		<i class="<?php echo $iconClass; ?>" style="color: <?php echo $iconColor; ?>;"></i>
    			<?php endif; ?>
    			<?php echo $username; ?></h4><br>
			  <span><?php echo $row['birthday']; ?></span>
              <span><?php echo $row['email']; ?></span>
			  <span><?php echo $row['contactNo']; ?></span>
              <p><?php echo $row['remark']; ?></p>
            </div>
          </div><?php } ?>
     </div>
      </div>
    </section>

   
    <section id="contact" class="contact section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Comment</h2>
        </div>
		  <div class="table-responsive">
		  <table class = "table table-bordered text-center">
			  <thead class="table-dark">
				  <tr>
					  <th scope="col">NO.</th>
					  <th scope="col">NAME</th>
					  <th scope="col">EMAIL</th>
					  <th scope="col">CONTACT NO.</th>
					  <th scope="col">COMMENT</th>
					  <th scope="col">IMAGE</th>
					  <th scope="col">ACTION</th>
				  </tr>
			  </thead>
			  <tbody>
				  <?php 
			
					  while($rows = mysqli_fetch_assoc($result1))
					  {
				  ?>
				  <tr>
					  <td><?php echo $i++ ?></td>
					  <td><?php echo $rows['username'] ?></td>
					  <td><?php echo $rows['email'] ?></td>
					  <td><?php echo $rows['contactNo'] ?></td>
					  <td><?php echo $rows['remark'] ?></td>
					  <td><?php echo '<img class="image" src="data:image/jpeg;base64,'.base64_encode($rows['photo']).'" style="width: 25%; height: 25%;" />'; ?></td>
					  <td><center>
						 <a href="deleteUser.php?userID=<?php echo $rows['userID'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">
  						 <i class="fa fa-trash fs-4 me-3" style="color: #eb0017;"></i></a></center>
					  </td>
				  </tr> <?php } ?>
			  </tbody>
		  </table>
		</div>
      </div>
    </section>
  </main>


  <footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>2023</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/waypoints/noframework.waypoints.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <script src="js/main.js"></script>

</body>

</html>