<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    header("Location: chemicaldata/");
} else {
    // Redirect them to the login page
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instructor - Login</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/instructor.css">
  </head>
  <body>
    <div class="container">
  	<form class="form-style" action="checkInstructor.php" method="post">
  		<div class="header">
        <div class="example-icon" > <img src="../images/logo.png" alt=""> </div>
        <small>FHS Chemistry Club - Instructor Portal</small>
        <p id = "return"></p>
  		</div>
      <hr>
  		<div class="content">
          <label for="inp" class="inp">
            <input type="text" id="user" placeholder="&nbsp;" name = "user">
            <span class="label">Username</span>
            <span class="border"></span>
          </label>
          <label for="inp" class="inp">
            <input type="password" id="pass" placeholder="&nbsp;" name = "pass">
            <span class="label">Password</span>
            <span class="border"></span>
          </label>

  		</div>
      <hr>
  		<div class="footer">
        <input type="submit" name="submit" value="Login" class="bton login" />
        <input type="button" name="submit" value="Register" class="bton register" id = "reg"/>
  		</div>
  	</form>
  </div>

  </body>
  <?php
  if (isset($_GET['Message'])) {
      print '<script type="text/javascript">document.getElementById("return").innerHTML = "Invaid Username or Password";</script>';
  }
   ?>
   <script type="text/javascript">
     document.querySelector("#reg").onclick = function(){
       window.location.href = "register/";
     };
   </script>


</html>
