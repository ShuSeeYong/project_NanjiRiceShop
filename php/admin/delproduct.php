<?php
   include_once('dbconnect.php');
   
   $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
    mysqli_select_db($conn,"doubleks_nanji");
   
   $sql="DELETE FROM tbl_products WHERE prid='$_GET[prid]'";
   $result = mysqli_query($conn,$sql);
   
   if($result){
       echo '<script type="text/javascript"> alert("Are you sure to delete this food?")</script>';
       echo "<script>window.location.replace('../admin/mainad.php')</script>";
   }else{
       echo "Error";
   }
?>