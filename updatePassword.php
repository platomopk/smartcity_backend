<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['username']))
    { 
        $username= mysqli_real_escape_string($con, $_GET['username']);
    }
    if(isset($_GET['dob']))
    { 
        $dob= mysqli_real_escape_string($con, $_GET['dob']);
    }
    if(isset($_GET['aType']))
    { 
        $aType= mysqli_real_escape_string($con, $_GET['aType']);
    }

    if(isset($_GET['email']))
    { 
        $email= mysqli_real_escape_string($con, $_GET['email']);
    }
    if(isset($_GET['country']))
    { 
        $country= mysqli_real_escape_string($con, $_GET['country']);
    }
    if(isset($_GET['city']))
    { 
        $city= mysqli_real_escape_string($con, $_GET['city']);
    }
     if(isset($_GET['number']))
    { 
        $number= mysqli_real_escape_string($con, $_GET['number']);
    }

    if(isset($_GET['dlnumber']))
    { 
        $dlnumber= mysqli_real_escape_string($con, $_GET['dlnumber']);
    }
    if(isset($_GET['exp']))
    { 
        $exp= mysqli_real_escape_string($con, $_GET['exp']);
    }
    if(isset($_GET['company']))
    { 
        $company= mysqli_real_escape_string($con, $_GET['company']);
    }

if ($aType === 'admin')
{$query= mysqli_query($con,
"Update admin SET Dob='$dob',Email='$email',Country='$country',City='$city',PhoneNumber='$number', DLNumber='$dlnumber',DExperience='$exp',DCompany='$company' Where Username='$username'
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
"Update admin SET Dob='$dob',Email='$email',Country='$country',City='$city',PhoneNumber='$number', DLNumber='$dlnumber',DExperience='$exp',DCompany='$company' Where Username='$username'
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