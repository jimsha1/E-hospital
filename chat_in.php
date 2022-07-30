<?php
include 'connection.php';
session_start();
$id=$_SESSION['login_id'];
if(isset($_POST['sub']))
{
    $doctor=$_POST['doctor'];  
    $name=$_POST['name'];
    $phoneno=$_POST['phoneno'];
    $message=$_POST['message'];
    $query=mysqli_query($conn,"select doctor_reg.doctor_id,patient_reg.patient_id from doctor_reg join patient_reg where doctor_reg.Name='$doctor' and patient_reg.login_id='$id'");
    if(mysqli_num_rows($query)>0){
      $result=mysqli_fetch_assoc($query);
      $doctor_id=$result['doctor_id'];
      $patient_id=$result['patient_id'];
      mysqli_query($conn,"insert into chat_in(patient_id,doctor_id,Name,Phone_no,Message,Replay,status) values ('$patient_id','$doctor_id','$name','$phoneno','$message','0','0')");
      header("location:patient_index.php");
  }
}
$qr=mysqli_query($conn,"select * from doctor_reg");
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Orthoc </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
<body class="sub_page">
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Orthoc
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="patient_index.php">Home </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about.php"> About <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
 <!-- contact section -->
 <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          chat
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form_container contact-form">
            <form action="" method="POST">
            <div class="form-row">
                <div class="col-lg-12">
                <div>
                    <select name="doctor" class="form-control" style=" background: #eeeeee; width: 100%; border: none;height: 50px;margin-bottom: 15px;paddingleft: 20px; outline: none;color: #101010;">

                        <option>Please select doctor to visit</option>
                        
                        <?php
                        while($row=mysqli_fetch_assoc($qr))
                        {
                          ?>
                        <option><?php echo $row['Name'];?></option>
                    <?php
                    }
                    ?>
                       
                    </select>
                  </div>
            </div>
            </div>
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="name" required placeholder=" Name" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="phoneno" required pattern="[0-9]{10}" placeholder="Phone Number" />
                  </div>
                </div>
              </div>
            <div>
                <input type="text" name="message" required placeholder="messages" />
            </div>
             
            <div class="btn_box">
              <button type="submit" name="sub" >send</button>
            </div>
            </form>
          </div>
        </div>
    </div>
  </section>
</div>
<!-- footer section -->
<footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Beatae provident nobis mollitia magnam voluptatum, unde dicta facilis minima veniam corporis laudantium alias tenetur eveniet illum reprehenderit fugit a delectus officiis blanditiis ea.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer_col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="" href="index.html">
                Home
              </a>
              <a class="active" href="about.html">
                About
              </a>
              <a class="" href="departments.html">
                Departments
              </a>
              <a class="" href="doctors.html">
                Doctors-
              </a>
              <a class="" href="contact.html">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col ">
          <h4>
            Newsletter
          </h4>
          <form action="#">
            <input type="email" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates<br><br></a>
            &copy; <span id="displayYear"></span> Distributed By
            <a href="https://themewagon.com/">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->
</body>
</html>
  <!-- end contact section -->
