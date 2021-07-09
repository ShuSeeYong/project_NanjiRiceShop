<!DOCTYPE html>
<html>
   <head>
      <title>Search Page</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/validate.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/search.css">
   </head>
   <body>
      <a class="back" href="mainus.php"><i class="fa fa-arrow-left"></i></a>
      <div class="header">
         <h2 style="text-align:center">That result that your searching ....</h2>
      </div>
      <?php
         $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
         mysqli_select_db($conn,"doubleks_nanji");
         
            $prname = $_POST['prname'];
            $prtype = $_POST['prtype'];
         
            if ($prtype == "all") {
                $sqlsearch = "SELECT * FROM tbl_products WHERE prname LIKE '%$prname%' ORDER BY prid DESC";
            } else {
                $sqlsearch = "SELECT * FROM tbl_products WHERE prtype = '$prtype' AND prname LIKE '%$prname%' ORDER BY prid DESC";
            }
         
         
         $sql = $conn -> query($sqlsearch);
         if($sql->num_rows >0){
             while ($row = $sql->fetch_array()){
             
      ?>
      <div class="column-card" >
         <div class="card">
            <div class="left">
               <img src = "/ShuSeeYong/project/images/<?php echo $row['image'];?>" height=70% width=70%/>
            </div>
            <div class="right">
               <h3 style="color:black"><?php echo $row['prname']; ?></h3>
               <p>Food Type: &nbsp&nbsp<?php echo $row['prtype']; ?></p>
               <p>Food Price: <?php echo $row['prprice']; ?></p>
               <p>Quantity: &nbsp&nbsp<?php echo $row['prqty']; ?></p>
               <a href='addcart.php?prid=<?php echo $row['prid']; ?>'><i class='fa fa-cart-plus'  onclick='return cartDialog()' style='font-size:24px;color:black'></i></a>
            </div>
         </div>
      </div>
      <?php
         }
           }else{
           echo "<script>alert('There are no result')</script>";
           echo "<script>window.location.replace('../user/mainus.php')</script>";
           }
      ?>
   </body>
</html>