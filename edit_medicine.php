<?php
include 'connection.php';
session_start();
$id=$_SESSION['login_id'];
$query=mysqli_query($conn,"select * from medicine_add");
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
            
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="admin_index.php">Home <span class="sr-only">(current)</span></a>
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
          edit medicine
        </h2>
    </div>
      <div class="row">
      <div class="col-md-12">
          <div class="form_container contact-form">
        <form action="" method="post">
                <table class="pure-table pure-table-bordered">
                    <tr>
                        <th>Madicine Name</th>
                        <th>Batch No.</th>
                        <th>Manufacture Date</th>
                        <th>Expire Date</th>
                        <th>Availability</th>
                        <th>Strip Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_assoc($query))
                    {
                        ?>
                    <tr>      
                            
                            <td><input type="text" name="name" value="<?php echo $row['medicine_name'];?>"></td>
                            <td><input type="text" name="batch" value="<?php echo $row['batch'];?>"></td>
                            <td><input type="text" name="manu_date" value="<?php echo $row['manufacture_date'];?>"></td>
                            <td><input type="text" name="exp_date" value="<?php echo $row['expire_date'];?>"></td>
                            <td><input type="text" name="availability" value="<?php echo $row['availablity'];?>"></td>
                            <td><input type="text" name="price" value="<?php echo $row['strip_price'];?>"></td>
                            <td><a href="edit_med.php?edit_id=<?php echo $row['medicine_id'];?> "class="btn-btn-primary" name="edit">Edit</a></td>
                            <td><a href="delet_medicine.php?delet_id=<?php echo $row['medicine_id'];?> "class="btn-btn-primary" name="edit">Delete</a></td>

                            
                            
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
      </div>
    </div>
                </div>
                </div>
</section>
                  </div>
                  </body>
</html>



