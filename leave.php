<?php
include 'connection.php';
session_start();
$id=$_SESSION['login_id'];
if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $department=$_POST['department'];
    $startdate=$_POST['strt_date'];
    $enddate=$_POST['end_date'];
    $reason=$_POST['reason'];
    $query=mysqli_query($conn,"select login_tb.login_id,doctor_reg.doctor_id from login_tb join doctor_reg WHERE login_tb.login_id='$id'");
    if(mysqli_num_rows($query)>0)
    {
        $result=mysqli_fetch_assoc($query);
        $doctor_id=$result['doctor_id'];
    mysqli_query($conn,"insert into doctor_leave(doctor_id,Name,Department,Start_date,End_date,Reason,Status)values('$doctor_id','$name','$department','$startdate','$enddate','$reason','0')");
    header("location:doctor_index.php");
    }
}
$q=mysqli_query($conn,"select * from department_tb");
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

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="images/hero-bg.png" alt="">
    </div>

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
              <li class="nav-item active">
                <a class="nav-link" href="doctor_index.php">Home <span class="sr-only">(current)</span></a>
              </li>
             
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Leave Request
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form_container contact-form">
            <form action="" method="POST">
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="name" required placeholder="Your Name" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                  <select name="department" class="form-control" style=" background: #eeeeee; width: 100%; border: none;height: 50px;margin-bottom: 15px;paddingleft: 20px; outline: none;color: #101010;">
                    <option value="Pleace select department to visit">Pleace select department</option>
                    <?php
                    while($row=mysqli_fetch_assoc($q))
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
                    <input type="date" name="strt_date" required placeholder="leave start" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="date" name="end_date" required placeholder="leave end" />
                  </div>
                </div>
                </div>
                <div>
                    <input type="text area" name="reason" required placeholder="Reason for leave" />
                </div>
                <div class="btn_box">
              <button type="submit" name="sub" >Send</button>
            </div>
            </form>
          </div>
        </div>
    </div>
  </section>
</body>
    <!-- end slider section -->
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

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>