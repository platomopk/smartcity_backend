<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['id']))
    { 
        $id= mysqli_real_escape_string($con, $_GET['id']);
     }
     if(isset($_GET['stime']))
    { 
        $stime= mysqli_real_escape_string($con, $_GET['stime']);
     }
if(isset($_GET['sloc']))
    { 
        $sloc= mysqli_real_escape_string($con, $_GET['sloc']);
    }
    if(isset($_GET['status']))
    { 
        $status= mysqli_real_escape_string($con, $_GET['status']);
    }
if(isset($_GET['admin']))
    { 
        $admin= mysqli_real_escape_string($con, $_GET['admin']);
    }
    if(isset($_GET['vehicle']))
    { 
        $vehicle= mysqli_real_escape_string($con, $_GET['vehicle']);
    }
     if(isset($_GET['driver']))
    { 
        $driver= mysqli_real_escape_string($con, $_GET['driver']);
    }

//query string
$query= mysqli_query($con,
"Insert into trips (TripId,StartTime,TAdmin,TDriver,TVehicle,StartLoc,Status) values
('$id','$stime',(select Username from admin where Username = '$admin'),(select Username from driver where Username='$driver'),(select PlateNumber from  vehicle where PlateNumber='$vehicle'),'$sloc','$status')");

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