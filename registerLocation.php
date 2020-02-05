<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['id']))
    { 
        $id = mysqli_real_escape_string($con, $_GET['id']);
     }
     if(isset($_GET['lat']))
    { 
        $lat = mysqli_real_escape_string($con, $_GET['lat']);
        $latA = explode(',', $lat);
        //$latlngA = explode(':', $latlng);
     }
     if(isset($_GET['lng']))
    { 
        $lng = mysqli_real_escape_string($con, $_GET['lng']);
        $lngA = explode(',', $lng);
        //$latlngA = explode(':', $latlng);
     }
if(isset($_GET['speed']))
    { 
        $speed = mysqli_real_escape_string($con, $_GET['speed']);
        $speedA = explode(',', $speed);
    }
    if(isset($_GET['accelerate']))
    { 
        $accelerate = mysqli_real_escape_string($con, $_GET['accelerate']);
        $accelerateA = explode(',', $accelerate);
    }
    if(isset($_GET['datestamp']))
    { 
        $datestamp = mysqli_real_escape_string($con, $_GET['datestamp']);
        $datestampA = explode(',', $datestamp);
    }
if(isset($_GET['timestamp']))
    { 
        $timestamp = mysqli_real_escape_string($con, $_GET['timestamp']);
        $timestampA = explode(',', $timestamp);
    }
    if(isset($_GET['altitude']))
    { 
        $altitude = mysqli_real_escape_string($con, $_GET['altitude']);
        $altitudeA = explode(',', $altitude);
    }

//query string
$querystring= "Insert into location (TripID,Lat,Lng,Speed,Accelerate,DateStamp,TimeStamp, Altitude) values";
for($x=0; $x<count($latA); $x++){
        $query_parts[] = "('".$id."','" . $latA[$x] ."','" . $lngA[$x] ."', '" . $speedA[$x] . "', '" . $accelerateA[$x] ."','" . $datestampA[$x] ."', '" . $timestampA[$x] . "', '" . $altitudeA[$x] . "')";
    }
$querystring .= implode(',', $query_parts);
//echo $querystring;
$query= mysqli_query($con,$querystring);

//((select TripId from trips where TripId = '$id'),'$latlng','$speed','$accelerate','$timestamp','$altitude')
//");

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