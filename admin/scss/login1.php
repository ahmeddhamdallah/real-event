<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Material Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>News Management System</h1>
</div>
<div class="rerun"><a href="">Rerun Pen</a></div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form class="form" action="login.php" method="post">
      <div class="input-container">
        <input type="text" name= "email" id="#{label}" required="required"/>
        <label for="#{label}">User Email </label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" name="pass" id="#{label}" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="login" id="login-button"><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="#{type}" id="#{label}" required="required"/>
        <label for="#{label}">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="#{type}" id="#{label}" required="required"/>
        <label for="#{label}">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="#{type}" id="#{label}" required="required"/>
        <label for="#{label}">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="../" title="Go To Home!"><i class="fa fa-link"></i></a>


  

    <script  src="js/index.js"></script>




</body>

</html>

<?php
  include "../libs/config.php";
  include "../libs/database.php";

  $db = new database ();

  if(isset($_POST['login'])) {

    $email =$_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM admin WHERE email='$email' AND pass='$pass'";

    $user = $db->select($query);

    $check = $user->num_rows;

    if($check > 0) {

      $_SESSION['email'] = $email;

      header("location: index.php?msg = Successfully Logged In");
    }
    else {
      echo "<script>alert('Password or Email is not correct !')</script>";

    }
  }


