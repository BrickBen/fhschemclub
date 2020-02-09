<?php

$email = $_POST['email'];
$Message = "In the next 24 hours your username and password will be sent to you by email. Thanks for signing up!";
$link = mysqli_connect("localhost", "fhscjvrp_instructor", "hsek12inus", "fhscjvrp_userdata");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO `unverified_instructors` (`email`) VALUES ('".$email."')";
if(mysqli_query($link, $sql)){
    header("Location: index.php?Message=" . urlencode($Message));
    exit;
  }

mysqli_close($link);


 ?>
