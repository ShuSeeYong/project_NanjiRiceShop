<?php
   include_once('dbconnect.php');
   
   
   $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
    mysqli_select_db($conn,"doubleks_nanji");
   
     $sqlupdatecart = "UPDATE tbl_cart SET qty = qty +1 WHERE prid = '$_GET[prid]'";
   $result = mysqli_query($conn,$sqlupdatecart);
   
   if($result){
       echo "<script> window.location.replace('cart.php')</script>";
   }
   else{
       echo "<script>alert('Failed To Add Quantity')</script>";
       echo "<script> window.location.replace('cart.php')</script>";
   }
?>