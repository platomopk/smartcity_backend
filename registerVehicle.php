<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['make']))
    { 
        $make= mysqli_real_escape_string($con, $_GET['make']);
     }
     if(isset($_GET['model']))
    { 
        $model= mysqli_real_escape_string($con, $_GET['model']);
     }
if(isset($_GET['year']))
    { 
        $year= mysqli_real_escape_string($con, $_GET['year']);
    }
if(isset($_GET['pnumber']))
    { 
        $pnumber= mysqli_real_escape_string($con, $_GET['pnumber']);
    }
if(isset($_GET['mileage']))
    { 
        $mileage= mysqli_real_escape_string($con, $_GET['mileage']);
    }
if(isset($_GET['power']))
    { 
        $power= mysqli_real_escape_string($con, $_GET['power']);
    }
if(isset($_GET['weight']))
    { 
        $weight= mysqli_real_escape_string($con, $_GET['weight']);
    }
if(isset($_GET['admin']))
    { 
        $admin= mysqli_real_escape_string($con, $_GET['admin']);
    }
    if(isset($_GET['driver']))
    { 
        $driver= mysqli_real_escape_string($con, $_GET['driver']);
    }

//query string
$query= mysqli_query($con,
"Insert into vehicle (Make,Model,Year,PlateNumber,Mileage,Power,Weight,vAdmin,vDriver) values
('$make','$model','$year','$pnumber','$mileage','$power','$weight',(select Username from admin where Username = '$admin'),(select Username from driver where Username='$driver'))
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