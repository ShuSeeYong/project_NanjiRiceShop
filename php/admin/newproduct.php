<?php
   include_once("dbconnect.php");
   
       if (isset($_POST['submit'])) {
         $primage = uniqid() . '.png';
          $prname = $_POST['prname'];
          $prtype = $_POST['prtype'];
          $prprice = $_POST['prprice'];
          $prqty = $_POST['prqty'];
          
      
          if (file_exists($_FILES["primage"]["tmp_name"]) || is_uploaded_file($_FILES["primage"]["tmp_name"])) {
              $sqlinsertprod =  "INSERT INTO tbl_products(image,prname, prtype, prprice, prqty) VALUES('$primage','$prname','$prtype','$prprice','$prqty')";
              if ($conn->exec($sqlinsertprod)) {
                  uploadImage($primage);
                  echo "<script>alert('Success')</script>";
                  echo "<script>window.location.replace('../admin/mainad.php')</script>";
              } else {
                  echo "<script>alert('Failed')</script>";
                  echo "<script>window.location.replace('../admin/newproduct.php')</script>";
                  return;
              }
            } else {
              echo "<script>alert('Image not available')</script>";
              echo "<script>window.location.replace('../admin/newproduct.php')</script>";
              return;
          }
       }
      
      function uploadImage($primage)
        {
          $target_dir = '/home8/doubleks/public_html/ShuSeeYong/project/images/';
          $target_file = $target_dir . $primage;
          move_uploaded_file($_FILES["primage"]["tmp_name"], $target_file);
        }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Add New Page</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/validate.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/style.css">
   </head>
   <body>
      <div class="header">
         <img src="/ShuSeeYong/project/images/edit1.png" alt="Logo">
         <h1>Welcome to Nanji Shop</h1>
         <p>Add New Food</p>
      </div>
      <div class="navbar">
         <a href="../admin/mainad.php" class="left">Main Page</a>
      </div>
      <div class="main">
         <br>
         <div class="container2">
            <form name="newForm" action="../admin/newproduct.php" onsubmit="return validateNewForm()" method="post" enctype="multipart/form-data">
               <div class="row" align="center">
                  <img class="imgselection" src="/ShuSeeYong/project/images/camera.png"><br>
                  <input type="file" onchange="previewFile()" name="primage" id="idimage" accept="image/*"><br>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-cutlery icon"></i>
                     <label for="prname"><b>Food Name</b></label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idname" name="prname" placeholder="Food name..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-envira icon"></i>
                     <label for="prtype"><b>Food Type</b></label>
                  </div>
                  <div class="col-75">
                     <select name="prtype" id="idtype">
                        <option value="noselection">Please select the food type</option>
                        <option value="hainan">Hai Nan</option>
                        <option value="steamed">Steamed</option>
                        <option value="grilled">Grilled</option>
                        <option value="blacksauce">Black Sauce</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-money icon"></i>
                     <label for="prprice"><b>Food Price(RM)</b></label>
                  </div>
                  <div class="col-75">
                     <input type="tel" id="idprice" name="prprice" placeholder="Food price is..">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-sort-numeric-asc icon"></i>
                     <label for="prqty"><b>Quantity</b></label>
                  </div>
                  <div class="col-75">
                     <input type="number" id="idqty" name="prqty" placeholder="Select food quantity.." min="1" max="100">
                  </div>
               </div>
               <div class="row">
                  <div><input type="submit" name="submit" value="Submit"></div>
               </div>
            </form>
         </div>
      </div>
      <br>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>

<script>
   function previewFile() {
       const preview = document.querySelector('.imgselection');
       const file = document.querySelector('input[type=file]').files[0];
       const reader = new FileReader();
       reader.addEventListener("load", function () {
           // convert image file to base64 string
              preview.src = reader.result;
       }, false);
       
       if (file) {
           reader.readAsDataURL(file);
       }
   }
</script>