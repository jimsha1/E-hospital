<?php
include 'connection.php';
session_start();
$id=$_GET['edit_id'];
mysqli_query($conn,"update doctor_leave set Status='1' where doctor_id='$id'" );
header("location:leave_approved.php");
?>