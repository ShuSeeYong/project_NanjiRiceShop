<?php
   include_once("dbconnect.php");
   
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Update Page</title>
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
         <p>Update Food</p>
      </div>
      <div class="navbar">
         <a href="../admin/mainad.php" class="left">Main Page</a>
      </div>
      <div class="main1">
         <br>
         <div class="container2">
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
            <form name="newForm" action="../admin/editprocess.php" onsubmit="return validateNewForm()" method="post" enctype="multipart/form-data">
               <div class="row" align="center">
                  <img class="imgselection" src="/ShuSeeYong/project/images/<?php echo $row['image'];?>"><br>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-cutlery icon"></i>
                     <label for="prname"><b>Food Name</b></label>
                  </div>
                  <div class="col-75">
                     <input type="text" id="idname" name="prname" placeholder="Food name.." value="<?php echo $row['prname'];?>">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-envira icon"></i>
                     <label for="prtype"><b>Food Type</b></label>
                  </div>
                  <div class="col-75">
                     <select name="prtype" id="idtype" >
                        <option value="noselection">Please select the food type</option>
                        <option value='hainan' <?php if($prtype == 'hainan') echo "selected"; ?>>Hai Nan</option>
                        <option value='steamed' <?php if($prtype == 'steamed') echo "selected"; ?>>Steamed</option>
                        <option value='grilled' <?php if($prtype == 'grilled') echo "selected"; ?>>Grilled</option>
                        <option value='blacksauce' <?php if($prtype== 'blacksauce') echo "selected"; ?>>Black Sauce</option>
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-money icon"></i>
                     <label for="prprice"><b>Food Price(RM)</b></label>
                  </div>
                  <div class="col-75">
                     <input type="tel" id="idprice" name="prprice" placeholder="Food price is.." value="<?php echo $row['prprice'];?>">
                  </div>
               </div>
               <div class="row">
                  <div class="col-25">
                     <i class="fa fa-sort-numeric-asc icon"></i>
                     <label for="prqty"><b>Quantity</b></label>
                  </div>
                  <div class="col-75">
                     <input type="number" id="idqty" name="prqty" placeholder="Select food quantity.." value="<?php echo $row['prqty'];?>" min="1" max="100">
                  </div>
               </div>
               <input type="hidden" name="prid" value="<?php echo $row["prid"]; ?>"/><br>
               <div class="row">
                  <div><input type="submit" name="submit" value="Update"></div>
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