<?php
   include_once('dbconnect.php');
   $prid = $_GET['prid'];
   $qty = $_GET['qty'];
   
   $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
    mysqli_select_db($conn,"doubleks_nanji");
     
     if ($qty == 1) {
       echo "<script>alert('Failed. Quantity cannot below than 1')</script>";
       echo "<script> window.location.replace('cart.php')</script>";
     }else{
       $sqlupdatecart = "UPDATE tbl_cart SET qty = qty -1 WHERE prid = $prid";
       $result = mysqli_query($conn,$sqlupdatecart);
     
     if($result){
       echo "<script> window.location.replace('cart.php')</script>";
     }else{
       echo "<script>alert('Failed To Minus Quantity')</script>";
       echo "<script> window.location.replace('cart.php')</script>";
     }
   }
   
?>