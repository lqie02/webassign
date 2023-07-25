<?php
include("connection.php");

$sql = "SELECT * FROM user;";
$result =  $conn->query($sql);
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
			  <span><?php echo $row['contactNo']; ?></span><br>
              <p><?php echo $row['remark']; ?></p>
            </div>
          </div><?php } ?>
     </div>
      </div>
    </section>

   
    <section id="contact" class="contact section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Upload Comment</h2>
          <p>Submit your comment here</p>
        </div>
        <div class="row mt-5 justify-content-center" style="background-color: white;padding-top: 50px;padding-bottom: 20px">
          <div class="col-lg-10">
            <form action="commentProcess.php" method="post" enctype="multipart/form-data"  >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="username" class="form-control" id="username" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
			  <div class="row" style="margin-top: 5px;">
                <div class="col-md-6 form-group">
                  <input type="text" name="contactNo" class="form-control" id="contactNo" placeholder="Contact No" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Your Birthday" required>
                </div>
              </div>
			  <div class="row" style="margin-top: 5px;">
                <div class="col-md-6 form-group">
                  <input type="file" class="form-control" name="image" placeholder="" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <select class="form-control" id="gender" name="gender">
					  <option value=""> -- Select Gender --</option>
       				  <option value="Male">Male</option>
        			  <option value="Female">Female</option>
					</select>
                </div>
              </div>
              <div class="form-group mt-2">
                <textarea class="form-control" name="remark" rows="4s" placeholder="Comment" required></textarea>
              </div><br>
              <div class="text-center"><button type="submit" class="btn btn-primary">Send Comment</button></div>
            </form>
          </div>
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