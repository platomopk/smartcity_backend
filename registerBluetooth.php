<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['id']))
    { 
        $id= mysqli_real_escape_string($con, $_GET['id']);
     }
     if(isset($_GET['name']))
    { 
        $name= mysqli_real_escape_string($con, $_GET['name']);
     }
if(isset($_GET['mac']))
    { 
        $mac= mysqli_real_escape_string($con, $_GET['mac']);
    }
    if(isset($_GET['signal']))
    { 
        $signal= mysqli_real_escape_string($con, $_GET['signal']);
    }
if(isset($_GET['timestamp']))
    { 
        $timestamp= mysqli_real_escape_string($con, $_GET['timestamp']);
    }
    if(isset($_GET['classification']))
    { 
        $classification= mysqli_real_escape_string($con, $_GET['classification']);
    }

//query string
$query= mysqli_query($con,
"Insert into bluetooth (TripID,Name,MAC,SignalStrength,Classification,TimeStamp) values
((select TripId from  trips where TripId = '$id'),'$name','$mac','$signal','$classification','$timestamp')
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