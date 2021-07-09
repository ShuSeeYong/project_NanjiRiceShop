<?php
   include 'dbconnect.php';
   session_start();
   $email=$_SESSION['email'];
   
   $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
    mysqli_select_db($conn,"doubleks_nanji");
   
   $query=mysqli_query($conn,"SELECT * FROM tbl_admin where email='$email'")or die(mysqli_error());
   $row=mysqli_fetch_array($query);
   
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Profile Form</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/valid.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/style.css">
   </head>
   <body>
      <div class="header">
         <h1>Welcome to Nanji Rice Shop</h1>
         <p>Profile Page</p>
      </div>
      <div class="navbar">
         <a href="../admin/mainad.php" class="left">Main Page</a>
      </div>
      <div class="main">
         <center><img src="/ShuSeeYong/project/images/edit1.png"></center>
         <div class="container">
            <?php
               $email=$_SESSION ["email"];
               
               $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
               mysqli_select_db($conn,"doubleks_nanji");
               
               $sql ="SELECT * FROM tbl_admin WHERE email=".$email++;
               
                  $result = mysqli_query($conn,$sql);
                  if($result ==true){
                    $row= mysqli_fetch_assoc($result);
                    $name=$row['name'];
                    $phone= $row['phone'];
                   }
            ?>
            <form name="profileForm" action="../admin/profile.php" onsubmit="return validateProForm()" method="post">
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-user icon"></i>
                     <label for="fname"><b>Name</b></label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idname" name="name" placeholder="Your name.." value="<?php echo $row['name'];?>">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-phone icon"></i>
                     <label for="lphone"><b>Phone</b></label>
                  </div>
                  <div class="col-75">
                     <input type="tel" id="idphone" name="phone" placeholder="Your phone number.." value="<?php echo $row['phone'];?>">
                  </div>
               </div>
               <input type="hidden" id="idemail" name="email" placeholder="Your email.." value="<?php echo $row['email'];?>">
               <div class="row">
                  <div><input type="submit" name="submit" value="Update Profile"></div>
               </div>
            </form>
         </div>
      </div>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>
<?php
   if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
       $query = "UPDATE tbl_admin SET name = '$name',
                                      phone = '$phone'
                                      WHERE email = '$email'";
       $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
<script type="text/javascript">alert("Update Successfully");
   window.location = "mainad.php";
</script>
<?php
   }              
?>