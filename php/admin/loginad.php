<?php
   session_start();
   include_once("dbconnect.php");
   
   if (isset($_POST['submit'])) {
       $email = trim($_POST['email']);
       $password = trim(sha1($_POST['password']));
       $sqllogin = "SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password' AND otp = '1'";
   
       $select_stmt = $conn->prepare($sqllogin);
       $select_stmt->execute();
       $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
       if ($select_stmt->rowCount() > 0) {
           $_SESSION["session_id"] = session_id();
           $_SESSION["email"] = $email;
           $_SESSION["name"] = $row['name'];
           $_SESSION["phone"] = $row['phone'];
           $_SESSION["datereg"] = $row['datereg'];
           $_SESSION["pass"] = $row['password'];
           echo "<script> alert('Login successful')</script>";
           echo "<script> window.location.replace('/ShuSeeYong/project/php/admin/mainad.php')</script>";
       } else {
           session_unset();
           session_destroy();
           echo "<script> alert('Login fail')</script>";
           echo "<script> window.location.replace('/ShuSeeYong/project/php/admin/loginad.php')</script>";
       }
   }
   if (isset($_GET["status"])) {
       if (($_GET["status"] == "logout")) {
           session_unset();
           session_destroy();
           echo "<script> alert('Session Cleared')</script>";
       }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Login Form</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/valid.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/style.css">
   </head>
   <body onload="loadCookies()">
      <div class="header">
         <h1>Welcome to Nanji Rice Shop</h1>
         <p>Login Form - Admin</p>
      </div>
      <div class="navbar">
         <a href="/ShuSeeYong/project/index.html" class="left">Home</a>
      </div>
      <div class="main">
         <center>
            <img src="/ShuSeeYong/project/images/edit1.png">
         </center>
         <div class="container">
            <form name="loginForm" action="../admin/loginad.php" onsubmit="return validateLoginForm()" method="post">
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
                     <label for="lname"><b>Password</b></label>
                  </div>
                  <div class="col-75">
                     <input type="password" id="idpass" name="password" placeholder="Your password..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="	fa fa-clone icon "></i>
                     <label for="remember"><b>Remember Me <b></label>
                     <input type="checkbox" class="checkbox" id="idremember" name="remember">
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="forget">
                     <a style="text-decoration:none;color:black;font-weight: bold;" href="/ShuSeeYong/project/php/admin/forget.php">Forgot password?</a>
                  </div>
               </div>
               <br>
               <div class="row">
                  <input type="submit" name="submit" value="Submit">
               </div>
            </form>
         </div>
      </div>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>