<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $surname = mysqli_real_escape_string($conn, $_POST['sname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $user_type = $_POST['user_type'];
   $vid = mysqli_real_escape_string($conn, $_POST['vid']);
   $housenumber =  $_POST['hnumber'];
   $suburb = mysqli_real_escape_string($conn, $_POST['sburb']);
   $PhoneNumber =  $_POST['pnumber'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password , user_type , vid, pnumber , suburb, housenumber ,surname) VALUES('$name','$email','$pass','$user_type','$vid','$PhoneNumber','$suburb','$housenumber','$surname')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};       


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="FirstName">
      <input type="text" name="sname" required placeholder="SurName">
      <input type="text" name="sburb" required placeholder="Suburb">
      <input type="number" name="pnumber" required placeholder="Phone Number(+233)">
      <input type="text" name="hnumber" required placeholder="House Number">
      <input type="text" name="vid" required placeholder="Valuation ID">
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="user_type">
         <option value="user">USER</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login here</a></p>
   </form>

</div>

</body>
</html>