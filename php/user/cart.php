<?php
session_start();
$email=$_SESSION ["email"];
include_once("dbconnect.php");


$sqlloadcart = "SELECT * FROM tbl_cart INNER JOIN tbl_products ON tbl_cart.prid = tbl_products.prid WHERE tbl_cart.email = '$email'";
$stmt = $conn->prepare($sqlloadcart);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
   <head>
      <title>My Cart Page</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/valida.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/sty.css">
   </head>
   <body>
      <div class="header">
         <img src="/ShuSeeYong/project/images/edit1.png" alt="Logo">
         <h1>Welcome to Nanji Rice Shop</h1>
         <p>Cart Page</p>
      </div>
      <div class="navbar">
         <a href="../user/mainus.php" class="left">Main Page</a>
      </div>
      <br>
      <div class="row">
         <?php
           $sumtotal = 0.0;
           foreach ($rows as $carts) {
            echo "<div class='column-card'>";
            $prid = $carts['prid'];
            $qty = $carts['qty'];
            $total = 0.0;
            $total = $carts['prprice'] * $carts['qty'];
            $imgurl = "/ShuSeeYong/project/images/".$carts['image'];
            ?>
            <div class='card'>
            <p align='right' style='margin-top:-5%;'><a href='delcart.php?prid=<?php echo $carts['prid']; ?>' class='fa fa-remove'  style='text-decoration:none'></a></p>
            <img src=<?php echo $imgurl ?> class='image'>
            <h3 align='center' style="color:black"><?php echo $carts['prname']; ?>  </h3>
            <p align='center'> RM <?php echo number_format($carts['prprice'],2) ?> /unit<br></p>
            <table class='center' style='margin-left:37%;'>
               <tr>
                  <td><a href='minusqty.php?prid=<?php echo $carts['prid'];?>&qty=<?php echo $carts['qty'];?>'><i class='fa fa-minus' style='font-size:24px;color:dodgerblue'></i></a></td>
                  <td>Qty <?php echo $carts['qty']; ?></td>
                  <td>&nbsp<a href='plusqty.php?prid=<?php echo $carts['prid'];?>&qty=<?php echo $carts['qty'];?>'><i class='fa fa-plus' style='font-size:24px;color:dodgerblue'></i></a></td>
               </tr>
            </table><br>
            Total: RM <?php echo number_format($total,2) ?><br>
            </div>
            </div>
            <?php
            $sumtotal = $total + $sumtotal;
        }
        echo "</div>";
        echo "<br>";
        echo "<h2 style='text-align:center'>Total Price: RM " . number_format($sumtotal, 2) . "</h2>";
        ?>
        </div>
         <br><br><br>
         <div class="container">
           <h2>Payment Form</h2>
             <form action="cartprocess.php" method="get">
               <div class="row">
                  <div class="col-25">
                    <i class="fa fa-envelope icon"></i>
                    <label for="lblemail">Your Email</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="idemail" name="email" value="<?php echo $email ?>" disabled>
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                    <i class="fa fa-user icon"></i>
                    <label for="lblname">Your Name</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="idname" name="name" placeholder="Your Name" required>
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                    <i class="fa fa-phone icon"></i>
                    <label for="lphone">Phone Number</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="idphone" name="phone" placeholder="Your phone" required>
                  </div>
               </div>
               <div class="row">
                   <div class="col-25">
                       <i class="fa fa-pencil icon"></i>
                       <label for="remarks"><b>Remarks: <b></label>
                   </div>
                   <div class="col-75">
                       <input type="text" id="idremarks" name="remarks" placeholder="Please key in your remarks">
                   </div>
               </div>
               <div class="row">
                  <div class="col-25">
                    <i class="fa fa-clock-o" style="margin-left:4%"></i>
                    <label for="ltime" style="margin-left:4%">Pickup Time</label>
                  </div>
                  <div class="col-75">
                    <input type="time" id="idtime" name="pickup" min="09:00" max="18:00" required>
                  </div>
               </div>
                    <input type="hidden" id="idprice" name="price" value="<?php echo $sumtotal ?>">
                    <input type="hidden" id="email" name="email" value="<?php echo $email ?>">
               <div class="row">
                  <div class="col-25">
                  </div>
                  <div class="col-75">
                    <input type="submit" name="submit" value="Pay">
                  </div>
               </div>
             </form>
         </div>
       <br><br>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>