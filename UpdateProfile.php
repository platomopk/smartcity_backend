<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['username']))
    { 
        $username= mysqli_real_escape_string($con, $_GET['username']);
    }
    if(isset($_GET['newPassword']))
    { 
        $newPassword= mysqli_real_escape_string($con, $_GET['newPassword']);
    }
    if(isset($_GET['aType']))
    { 
        $aType= mysqli_real_escape_string($con, $_GET['aType']);
    }

if ($aType === 'admin')
{$query= mysqli_query($con,
"Update admin SET Password='$newPassword' Where Username='$username'
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
}
else{
    $query= mysqli_query($con,
"Update driver SET Password='$newPassword' Where Username='$username'
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

}

mysqli_close($con);
?>