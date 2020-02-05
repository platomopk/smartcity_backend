<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['id']))
    { 
        $id= mysqli_real_escape_string($con, $_GET['id']);
     }
     if(isset($_GET['temp']))
    { 
        $temp= mysqli_real_escape_string($con, $_GET['temp']);
     }
if(isset($_GET['timestamp']))
    { 
        $timestamp= mysqli_real_escape_string($con, $_GET['timestamp']);
    }

//query string
$query= mysqli_query($con,
"Insert into weather (TripID,Temperature,TimeStamp) values
((select TripId from trips where TripId = '$id'),'$temp','$timestamp')
");

$response = array();
    // check if row inserted or not
    if ($query) {
        $response["success"] = "Yes";
        echo json_encode($response);
    } else {
        $response["success"] = "no";
        echo json_encode($response);
    }



mysqli_close($con);
?>