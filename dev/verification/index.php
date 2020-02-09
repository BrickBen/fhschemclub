<?php
$link = mysqli_connect("localhost", "fhscjvrp_instructor", "hsek12inus", "fhscjvrp_userdata");
$cal = 0;
$splash = 0;
$numRows = 0;
$class = "zui-table";
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM unverified_instructors";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class = 'zui-table'>";
            echo "<thead> <tr>";
                echo "<th>Emails</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
              }
              echo "</table>";
              echo "<br><br><br>";
              mysqli_free_result($result);
            }else{
            echo "No records matching your query were found.";
          }
          } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
          }


          mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification</title>
    <style media="screen">
    .zui-table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        border-spacing: 0;
        font: normal 13px Arial, sans-serif;
    }
    .zui-table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
    }
    .zui-table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }

    tr:hover{
        background-color: lightgrey;
    }

    </style>
  </head>
  <body>
  </body>
