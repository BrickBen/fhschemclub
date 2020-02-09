
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Instructor - Register</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/instructor.css">
  </head>
  <body>
    <div class="container">
  	<form class="form-style" action="sendRegistration.php" method="post">
  		<div class="header">
        <div class="example-icon" > <img src="../images/logo.png" alt=""> </div>
        <small>FHS Chemistry Club - Register</small>
        <p id = "return"></p>
  		</div>
      <hr>
  		<div class="content">
          <label for="inp" class="inp">
            <input type="text" id="user" placeholder="&nbsp;" name = "user">
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


</html>
