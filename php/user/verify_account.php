<?php
    error_reporting(0);
    include_once("dbconnect.php");
    $email = $_GET['email'];
    $otp = $_GET['key'];
    
    $sql = "SELECT * FROM tbl_user WHERE email = '$email' AND otp='$otp'";
    $result = $conn->query($sql);
    try {
        $sqlupdate = "UPDATE tbl_user SET otp = '1' WHERE email = '$email' AND otp = '$otp'";
        $conn->exec($sqlupdate);
        // echo 'Verify Success';
        echo "<script> alert('Verify Success')</script>";
        echo "<script> window.location.replace('/ShuSeeYong/project/php/user/loginus.php')</script>";
      } 
      catch(PDOException $e) {
        // echo 'Verify Failed';
        echo "<script> alert('Verify Failed, Please register again!')</script>";
        echo "<script> window.location.replace('/ShuSeeYong/project/html/register.html')</script>";
      }
?>