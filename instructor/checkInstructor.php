<?php


$user = $_POST['user'];
$pass = $_POST['pass'];
$Message = "Invalid Username or Password";


$link = mysqli_connect("localhost", "fhscjvrp_instructor", "hsek12inus", "fhscjvrp_userdata");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



$sql = "SELECT * FROM instructor_data";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_row($result)) {
        foreach($row as $column => $value) {
          if($value == hash('sha256', $user."_".$pass)){
            echo "Success";
            exit();
          }
    }
    header("Location: index.php?Message=" . urlencode($Message));
}
        }else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);









 ?>
