
<?php
include 'connection.php';
session_start();
$id=$_SESSION['login_id'];
$query=mysqli_query($conn,"select doctor_id from doctor_reg where login_id='$id'");
if(mysqli_num_rows($query)>0){
    $result=mysqli_fetch_assoc($query);
    $doctor_id=$result['doctor_id'];
    
    $qry=mysqli_query($conn,"select * from chat_in where doctor_id='$doctor_id' ");
}
  
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
  <style>
    table,td,th{border:2px solid black;
    border-collapse:collapse;}
  </style>
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
              <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
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
          chat replay
        </h2>
    </div>
      <div class="row">
        <form action="" method="post">
                <table class="pure-table pure-table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Message</th>
                        
                        <th>Action</th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        ?>
                    <tr>
                            <td><?php echo $row['Name'];?></td>
                            <td><?php echo $row['Message'];?></td>
                            <?php
                            if($row['status']==0)
                            {
                              ?>
                            <td><a href="replay.php?edit_id=<?php echo $row['patient_id']; ?>" name="edit" value="edit" class="btn btn-primary">Pending</a></td>
                            <?php
                            }
                            else{
                              ?>
                              <td><a href="" class="btn btn-primary">Send</a></td>
                              <?php
                            }
                            ?>
                            
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
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


