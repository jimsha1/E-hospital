<?php
include 'connection.php';
session_start();
$id=$_GET['delet_id'];
mysqli_query($conn,"delete from medicine_add where medicine_id='$id'");
header("location:admin_index.php");
?>