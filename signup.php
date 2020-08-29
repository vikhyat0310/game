<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>

  	<div class="login">
  		<a href="login.php" style="color: white;">Login</a>
  	</div>
  	<img class="bg" src="https://media.istockphoto.com/photos/register-here-picture-id1210027737" alt="background-image">
    <div class="container">
        <h1>Signup Here!</h3>
        <p>Enter your details</p>


         
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password">
            <button class="btn" name="submit" type="submit">Submit</button> 
        </form>
    </div>
  </body>
  </html>






<?php

include 'config.php';

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpassword = password_hash($cpassword, PASSWORD_BCRYPT);

  $emailquery= "SELECT * FROM table  WHERE email='$email'";
  $query = mysqli_query($con,$emailquery);
  $emailcount = mysqli_num_rows($query);
  if($emailcount>0){
    header("location: login.php");
  }
  else{

    if($name!=NULL && $email!=NULL && $phone!= NULL && $password!=NULL && $cpassword!=NULL){
      if($password != $cpassword)
        echo "passwords dont match";
      else{
        $insertquery ="INSERT INTO table(name,email,phone,password,cpassword) VALUES('$name', '$email','$phone','$pass','$cpassword')";
        $iquery = mysqli_query($con, $insertquery);
          }
          header("location:login.php");
    }
  else
    echo "fill all details";
  }
}

?>

