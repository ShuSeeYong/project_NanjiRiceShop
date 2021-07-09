<!DOCTYPE html>
<html>
   <head>
      <title>Forget Page</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/validate.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/style.css">
   </head>
   <body>
      <div class="header">
         <h1>Welcome to Nanji Rice Shop</h1>
         <p>Forget Password Form</p>
      </div>
      <div class="navbar">
         <a href="/ShuSeeYong/project/php/user/loginus.php" class="left">Home</a>
      </div>
      <div class="main">
         <center>
            <img src="/ShuSeeYong/project/images/edit1.png">
         </center>
         <div class="container">
            <form name="forgetForm" action="../user/forget.php" onsubmit="return validateForgetForm()" method="post">
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-envelope icon"></i>
                     <label for="femail"><b>Email</b></label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idemail" name="email" placeholder="Your email..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-key icon"></i>
                     <label for="lname"><b>New Password</b></label>
                  </div>
                  <div class="col-75">
                     <input type="password" id="idpass" name="password" placeholder="Your new password..">
                  </div>
               </div>
               <br>
               <div class="row">
                  <input name="submit" type="submit" value="Submit">
               </div>
            </form>
         </div>
      </div>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
      <?php
         $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
         mysqli_select_db($conn,"doubleks_nanji");
         
         if(isset($_POST['submit'])){
         //code...
         $email = trim($_POST['email']);
         $password = trim(sha1($_POST['password']));
         if(mysqli_query($conn,"UPDATE tbl_user SET password='$password' WHERE email='$email'")){
         
      ?>
      <?php
         echo '<script type="text/javascript"> alert("Password Update Successfully")</script>';
         header("refresh:1; url=/ShuSeeYong/project/php/user/loginus.php");
      ?>
      <?php
         }else{
           echo 'no result';
         }}
      ?>
   </body>
</html>