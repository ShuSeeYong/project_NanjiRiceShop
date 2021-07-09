<?php
   session_start();
   $email=$_SESSION ["email"];
   
   include_once("dbconnect.php");
   
   if (isset($_POST['submit'])) {
      $prid = $_POST['prid'];
      $qty = $_POST['qty'];
      
      $sqlinsertcart =  "INSERT INTO tbl_cart(email, prid, qty) VALUES('$email',$prid,'$qty')";
         if ($conn->exec($sqlinsertcart)) {
            echo "<script>alert('Success Add To Cart')</script>";
            echo "<script>window.location.replace('../user/mainus.php')</script>";
         } else {
            echo "<script>alert('Failed')</script>";
            echo "<script>window.location.replace('../user/addcart.php')</script>";
            return;
           }
         }  
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Add Cart Page</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/validate.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/style.css">
   </head>
   <body>
      <div class="header">
         <h1>Welcome to Nanji Rice Shop</h1>
         <h1>Add to Cart </h1>
      </div>
      <div class="navbar">
         <a href="../user/mainus.php" class="left">Main Page</a>
      </div>
      <div class="main">
         <br>
         <div class="container">
            <?php
               $prid=$_GET['prid'];
               
               $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
               mysqli_select_db($conn,"doubleks_nanji");
               
               $sql ="SELECT * FROM tbl_products WHERE prid=".$prid++;
               $result = mysqli_query($conn,$sql);
               
               if($result ==true){
                  $row= mysqli_fetch_assoc($result);
               	$prname=$row['prname'];
               	$prtype = $row['prtype'];
               	$prprice = $row['prprice'];
               	$prqty = $row['prqty'];
               }
            ?>
            <form name="cartForm" action="../user/addcart.php" onsubmit="return validateCartForm()" method="post" enctype="multipart/form-data">
               <div class="row" align="center">
                  <img class="imgselection" src="/ShuSeeYong/project/images/<?php echo $row['image'];?>"><br>
               </div>
               <br>
               <div class="row">
                  <div class="col-25" style="text-align:center;font-size:24px">
                     <label for="prname" ><b><?php echo $row['prname']; ?></b></label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-25" style="text-align:center;font-size:18px;color:darkslateblue">
                     <label for="prprice"><b>Food Price: RM<?php echo $row['prprice'];?></b></label>
                  </div>
               </div>
               <br><br>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-sort-numeric-asc icon"></i>
                     <label for="qty"><b>Quantity: </b></label>
                  </div>
                  <div class="col-75">
                     <input type="number" id="idqty" name="qty" placeholder="Select food quantity that you want to order.." min="1" max=<?php echo $row['prqty'];?>>
                  </div>
               </div>
               <input type="hidden" name="prid" value="<?php echo $row["prid"]; ?>"/><br>
               <div class="row">
                  <div><input type="submit" name="submit" value="Add To Cart"></div>
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