<?php
   session_start();
   include_once("dbconnect.php");
   
   $email=$_SESSION ["email"];
   
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Main Page</title>
      <link rel="shortcut icon" type="image" href="/ShuSeeYong/project/images/edit1.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="/ShuSeeYong/project/js/validate.js"></script>
      <link rel="stylesheet" href="/ShuSeeYong/project/css/style.css">
   </head>
   <body>
      <div class="header">
         <a class="logout" href="/ShuSeeYong/project/index.html"><i class="fa fa-sign-out"></i></a>
         <img src="/ShuSeeYong/project/images/edit1.png" alt="Logo">
         <h1>Welcome to Nanji Rice Shop</h1>
         <p>Main Page</p>
      </div>
      <div class="navbar">
         <a href="../user/cart.php" class="right">My Cart &nbsp<i class="fa fa-shopping-cart"></i></a>
         <a href="../user/profile.php" class="right">Manage Profile &nbsp<i class="fa fa-user-o"></i></a>
      </div>
      <div class="main">
         <center>
            <h1 style="margin-top:-2%;">Welcome <?php echo $email?> to Nanji Rice Shop</h1>
            <br><br>
            <h2>Food List</h2>
         </center>
      </div>
      <div class="navbar1">
         <form action="../user/search.php" method="POST" align="right">
            <div class="row">
               <div class="column1">
                  <input type="text" id="idname" name="prname" placeholder="Food name..">
               </div>
               <div class="column1">
                  <select id="idtype" name="prtype">
                     <option value="all">All</option>
                     <option value="hainan">Hai Nan</option>
                     <option value="steamed">Steamed</option>
                     <option value="grilled">Grilled</option>
                     <option value="blacksauce">Black Sauce</option>
                  </select>
               </div>
               <div class="column1">
                  <button type="submit" name="button" value="search"><i class="fa fa-search"></i></button>
               </div>
            </div>
         </form>
      </div>
      <div class="row">
         <?php
            $conn = mysqli_connect("localhost","doubleks_nanjiadmin","YSgikXGFohQ5") or die("Unable to connect");
            mysqli_select_db($conn,"doubleks_nanji");
            
            $sql ="SELECT * FROM tbl_products ORDER BY prid DESC";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
            	while($row=mysqli_fetch_assoc($result)){
         ?>
         <div class="column-card" >
            <div class="card">
               <div class="left">
                  <img src = "/ShuSeeYong/project/images/<?php echo $row['image'];?>" height=80% width=80%/>
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
            }}
         ?>
      </div>
      <br><br>
      <div class="footer">
         <p>copyright <span>&#169;</span> 2021 Seeyong</p>
      </div>
   </body>
</html>