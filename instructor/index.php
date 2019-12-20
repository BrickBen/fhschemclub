<?php 
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instructor - Login</title>
    <link rel="stylesheet" href="../css/instructor.css">
  </head>
  <body>
    <div class="container">
  	<form class="form-style" action="checkInstructor.php" method="post">
  		<div class="header">
        <div class="example-icon" > <img src="../images/logo.png" alt=""> </div>
        <small>FHS Chemistry Club - Instructor Portal</small>
  		</div>
      <hr>
  		<div class="content">
          <label for="inp" class="inp">
            <input type="text" id="inp" placeholder="&nbsp;" name = "user">
            <span class="label">Username</span>
            <span class="border"></span>
          </label>
          <label for="inp" class="inp">
            <input type="password" id="inp" placeholder="&nbsp;" name = "pass">
            <span class="label">Password</span>
            <span class="border"></span>
          </label>

  		</div>
      <hr>
  		<div class="footer">
        <input type="submit" name="submit" value="Login" class="bton login" />
        <input type="submit" name="submit" value="Register" class="bton register" />
  		</div>
  	</form>
  </div>

  </body>

</html>
