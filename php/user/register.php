<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/doubleks/public_html/PHPMailer/src/Exception.php';
require '/home8/doubleks/public_html/PHPMailer/src/PHPMailer.php';
require '/home8/doubleks/public_html/PHPMailer/src/SMTP.php';

    include_once("dbconnect.php");
    
     $name = $_POST["name"];
     $email = $_POST["email"];
     $phone = $_POST["phone"];
     $passa = $_POST["passworda"];
     $passb = $_POST["passwordb"];
     $shapass = sha1($passa);  
     $otp = rand(1000,9999);

     if (!(isset($name) || isset($email) || isset($phone) ||isset($gender) || isset($passa) || isset($passb))){
        echo "<script>alert('Please Fill in All Required Information !')</script>";
        echo "<script>window.location.replace('/ShuSeeYong/project/html/register.html')</script>";
    }else{
       $sqlregister = "INSERT INTO tbl_user(name,email,phone,password,otp) VALUES('$name','$email','$phone','$shapass','$otp')";
       try{
           $conn->exec($sqlregister);
           echo "<script> alert('Registration Successful. An email has been sent to $email Please check your email for OTP verification. Also check in your spam folder. ')</script>";
           echo "<script> window.location.replace('/ShuSeeYong/project/php/user/loginus.php')</script>";
           sendEmail($otp,$email);
       }catch(PDOException $e){
           echo "<script> alert('Registration Failed')</script>";
           echo "<script> window.location.replace('/ShuSeeYong/project/html/register.html')</script>";
       }
    } 
    function sendEmail($otp,$email){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                               //Disable verbose debug output
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host       = 'mail.doubleksc.com';                          //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = 'nanji@doubleksc.com';                  //SMTP username
    $mail->Password   = '5cEFdLyK96cw';                                 //SMTP password
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;
    
    $from = "nanji@doubleksc.com";
    $to = $email;
    $subject = "From Nanji. Please Verify Your Account";
    $message = "<p>Click the following link to verify your account<br><br><a href='https://doubleksc.com/ShuSeeYong/project/php/user/verify_account.php?email=".$email."&key=".$otp."'>Click Here to Verify Your Account.</a>";
    
    $mail->setFrom($from,"Nanji");
    $mail->addAddress($to);                                             //Add a recipient
    
    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
    }
?>