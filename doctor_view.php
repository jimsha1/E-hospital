<?php
session_start();
$id=$_SESSION['login_id'];
// var_dump($id);exit();
include 'connection.php';
$query=mysqli_query($conn,"SELECT * FROM doctor_reg where login_id='$id'");
if(isset($_POST['sub']))
{
  $name=$_POST['name'];
  $address=$_POST['address'];
  $department=$_POST['department'];
  $qualification=$_POST['qualification'];
  mysqli_query($conn,"update doctor_reg set Name='$name',Address='$address',Department='$department',Qualification='$qualification'");
  header("location:doctor_index.php");
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
        My Profile
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form_container contact-form">
            <form action="" method="post">
              <?php
              while($row=mysqli_fetch_assoc($query))
              {
                ?>
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <label>Name</label><input type="text" name="name" value="<?php echo $row ['Name'];?>"/>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <label>Address</label><input type="text" name="address" value="<?php echo $row ['Address'];?>"  />
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <label>Department</label><input type="text" name="department" value="<?php echo $row ['Department'];?>"/>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <label>Qualification</label><input type="text" name="qualification" value="<?php echo $row ['Qualification'];?>"  />
                  </div>
                </div>
              </div>
              <div class="btn_box">
              <button type="submit" name="sub" >Edit</button>
              </div>
              <?php
              }
              ?>
              </div>
           
</body>

</html>
              
              
    
    
       
            
           
              
              
             
            
      
    