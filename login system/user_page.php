<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>HI, <span>user</span></h3>
      <h1>WELCOME <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <body>
   
<div class="form-container">

   <form action="" method="post">
   <h3>PAYMENT</h3>
      <select name="property_type">
         <option value="user">Residential</option>
         <option value="user">Commercial</option>
         <option value="user">Mixed</option>
   </select>
      <input type="static" name="name" required placeholder='<?php echo $_SESSION['user_name'] ?>'>
      <input type="text" name="hnumber" required placeholder="House Number (auto generated)">
      <input type="text" name="sburb" required placeholder="Suburb (auto generated)">
      <input type="text" name="vid" required placeholder="Valuation ID (auto generated)">
      <p></p>

      <input type="number" name="rv" required placeholder="Rateable value">
      <input type="number" name="cc" required placeholder="Current Charge">
      <input type="number" name="ar" required placeholder="Arrears">
      <input type="number" name="ad" required placeholder="Amount Due">
      <input type="submit" name="submit" value="PAY NOW" class="form-btn">
      <a href="logout.php" class="btn">logout</a>
      </div>
</div>
   </form>
</body>
   </div>

</div>

</body>

</div>
</html>