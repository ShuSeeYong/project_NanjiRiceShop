<?php
   //echo "EdIT SUCCESS"
   $primage = uniqid() . '.png';
   $prid=$_POST['prid'];
   $prname=$_POST['prname'];
   $prtype = $_POST['prtype'];
   $prprice = $_POST['prprice'];
   $prqty = $_POST['prqty'];
   
   $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
    mysqli_select_db($conn,"doubleks_nanji");
    
    $sql="UPDATE tbl_products SET  prname='$prname',
                                   prtype = '$prtype',
                                   prprice = '$prprice',
                                   prqty = '$prqty'
                                   WHERE prid='$prid'";
   
     $result= mysqli_query($conn,$sql) or die(mysqli_error());
     if($result == true){
          echo '<script type="text/javascript"> alert("Are you sure to update the food information?")</script>';
          echo "<script>window.location.replace('../admin/mainad.php')</script>";
     }else{
             echo "Error";
     }
?>