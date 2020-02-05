<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['fname']))
    { 
        $fname= mysqli_real_escape_string($con, $_GET['fname']);
     }
     if(isset($_GET['lname']))
    { 
        $lname= mysqli_real_escape_string($con, $_GET['lname']);
     }
if(isset($_GET['mobile']))
    { 
        $mobile= mysqli_real_escape_string($con, $_GET['mobile']);
    }
if(isset($_GET['gender']))
    { 
        $gender= mysqli_real_escape_string($con, $_GET['gender']);
    }
if(isset($_GET['city']))
    { 
        $city= mysqli_real_escape_string($con, $_GET['city']);
    }
if(isset($_GET['country']))
    { 
        $country= mysqli_real_escape_string($con, $_GET['country']);
    }
if(isset($_GET['email']))
    { 
        $email= mysqli_real_escape_string($con, $_GET['email']);
    }
if(isset($_GET['password']))
    { 
        $password= mysqli_real_escape_string($con, $_GET['password']);
    }
    if(isset($_GET['dexp']))
    { 
        $dexp= mysqli_real_escape_string($con, $_GET['dexp']);
    }
if(isset($_GET['username']))
    { 
        $username= mysqli_real_escape_string($con, $_GET['username']);
    }
    if(isset($_GET['dlnumber']))
    { 
        $dlnumber= mysqli_real_escape_string($con, $_GET['dlnumber']);
    }
    if(isset($_GET['dcompany']))
    { 
        $dcompany= mysqli_real_escape_string($con, $_GET['dcompany']);
    }
if(isset($_GET['dob']))
    { 
        $dob= mysqli_real_escape_string($con, $_GET['dob']);
    }
    if(isset($_GET['admin']))
    { 
        $admin= mysqli_real_escape_string($con, $_GET['admin']);
    }

//query string
$query= mysqli_query($con,
"Insert into driver (FirstName,LastName,Gender,DOB,Email,Username,Password,Country,City,PhoneNumber,DLNumber,DExperience,DCompany,DAdmin) values
('$fname','$lname','$gender','$dob','$email','$username','$password','$country','$city','$mobile','$dlnumber','$dexp','$dcompany',(select Username from  admin where Username = '$admin'))
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