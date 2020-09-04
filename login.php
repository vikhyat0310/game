<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div style="float: right;background-color: blue; padding: 10px 20px 10px 20px; margin-top: -25px;">
      <a style="color: white;" href="signup.php">Signup</a>
    </div>
  
<div class="container mt-4">
<h3>Login Here:</h3>
<hr>

<form action="login.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  
  <button type="submit" name="loginsubmit" class="btn btn-primary">Submit</button>
  <a href="signup.php">Register Now</a>
</form>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>





<?php
    include 'config.php';

    if(isset($_POST['loginsubmit']))
    {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password = md5($password);

      $query = "SELECT * FROM userinfo WHERE email='$email' AND password='$password'";
      $results = mysqli_query($con, $query);
      if(mysqli_num_rows($results)>0)
      {
          session_start();
          $_SESSION['email'] = $email;
          header("location: index.php");
      }
      else
      { 
          echo "Username or Password is Incorrect";
      }
    }


?>