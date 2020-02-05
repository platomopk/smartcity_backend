<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['id']))
    { 
        $id= mysqli_real_escape_string($con, $_GET['id']);
     }
     if(isset($_GET['etime']))
    { 
        $etime= mysqli_real_escape_string($con, $_GET['etime']);
     }
if(isset($_GET['eloc']))
    { 
        $eloc= mysqli_real_escape_string($con, $_GET['eloc']);
    }
    if(isset($_GET['status']))
    { 
        $status= mysqli_real_escape_string($con, $_GET['status']);
    }

//query string
$query= mysqli_query($con,
"Update trips SET EndTime='$etime',EndLoc='$eloc',Status='$status' Where TripId='$id'
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

?>