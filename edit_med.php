<?php
include 'connection.php';
session_start();
$id=$_GET['edit_id'];
$query=mysqli_query($conn,"select * from medicine_add where medicine_id='$id'");
if(isset($_POST['edit'])){
    $name=$_POST['name'];
    $batchno=$_POST['batch'];
    $manufacturedate=$_POST['manu_date'];
    $expiredate=$_POST['exp_date'];
    $availability=$_POST['availability'];
    $price=$_POST['price'];
    mysqli_query($conn,"update medicine_add set medicine_name='$name',batch='$batchno',manufacture_date='$manufacturedate',expire_date='$expiredate',availablity='$availability',strip_price='$price' where medicine_id='$id'"); 
    header ("location:edit_medicine.php");
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
                            <td><button class="btn-btn-primary" name="edit">Edit</button></td>
                            

                            
                            
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

