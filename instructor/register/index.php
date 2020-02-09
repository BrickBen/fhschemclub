<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instructor - Register</title>
    <link rel="shortcut icon" href="../../images/logo.png">
    <link rel="stylesheet" href="../../css/instructor.css">
    <style media="screen">
    .loader {
      display:none;
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
      }

      @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
}
#return{
  color: green;
}
    </style>
  </head>
  <body>
    <div class="container">
  	<form class="form-style" action="sendRegistration.php" method="post">
  		<div class="header">
        <div class="example-icon" > <img src="../../images/logo.png" alt=""> </div>
        <small>FHS Chemistry Club - Register</small>
        <p id = "return"></p>
  		</div>
      <hr>
      <div class="loader"></div>
  		<div class="content">
          <label for="inp" class="inp">
            <input type="email" id="user" placeholder="&nbsp;" name = "email" required>
            <span class="label">Email</span>
            <span class="border"></span>
          </label>
  		</div>
      <hr>
  		<div class="footer">
        <input type="submit" name="submit" value="Register" class="bton register" />
  		</div>
  	</form>
  </div>

  </body>
  <?php
  if (isset($_GET['Message'])) {
      print '<script type="text/javascript">document.getElementById("return").innerHTML = "Invaid Username or Password";</script>';
  }
   ?>

</html>
