<?php


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890&^%$#@!';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$user = $_post['verify'];
$pass = randomPassword();
$insertion = hash('sha256', $user."_".$pass);


$link = mysqli_connect("localhost", "fhscjvrp_instructor", "hsek12inus", "fhscjvrp_userdata");
$sql = "INSERT INTO `instructor_data` (`user`) VALUES ('".$insertion."')";
if(mysqli_query($link, $sql)){
  $msg = "

  Thank you for signing up! Your information is as follows:

  Username: ".$user."

  Password: ".$pass."


  Send me an email at lilleben000@hsestudents.org if you have any questions, concerns, or issues.

  ";
  mail($_POST["verify"],"Information For Material Database", $msg);

}

mysqli_close($link);



 ?>
