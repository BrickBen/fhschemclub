<?php

// function randomPassword() {
//     $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890&^%$#@!';
//     $pass = array(); //remember to declare $pass as an array
//     $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
//     for ($i = 0; $i < 10; $i++) {
//         $n = rand(0, $alphaLength);
//         $pass[] = $alphabet[$n];
//     }
//     return implode($pass); //turn the array into a string
// }
$email = $_POST['email'];
$Message = "In the next 24 hours your username and password will be sent to you by email. Thanks for signing up!"
$link = mysqli_connect("localhost", "fhscjvrp_instructor", "hsek12inus", "fhscjvrp_userdata");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "INSERT INTO unverified_instructors (email) VALUES ('Yo')";
if(mysqli_query($link, $sql)){
    header("Location: index.php?Message=" . urlencode($Message));
    exit;
  }





 ?>
