<?php
//json format
header('Content-type:Application/json');
//including db
include 'db_connect.php';

if(isset($_GET['email']))
{ 
        $email= mysqli_real_escape_string($con, $_GET['email']);
}
if(isset($_GET['aType']))
{ 
        $aType= mysqli_real_escape_string($con, $_GET['aType']);
}
if ($aType === 'Admin'){
//query string
$query= mysqli_query($con,"select Email,Password from admin Where Email='$email'");


$responseNew = array();

if (mysqli_num_rows($query)>0) {
    while($row=mysqli_fetch_assoc($query))
        { 
               $to = $row['Email'];
               $subject = "Password Recovery";
               $message = "Your Password \n".$row['Password'];
               $header = "From:NO-REPLY@pdttests.com \r\n";
               $retval = mail ($to,$subject,$message,$header);

               if ($retval) {
                    $responseNew["success"] = "yes";
                    // echoing JSON response
                    echo json_encode($responseNew);
               }else{
                    $responseNew["success"] = "No Valid Email";
                    // echoing JSON response
                    echo json_encode($responseNew);
               }
        }
}else{
                        $responseNew["success"] = "no";
                    // echoing JSON response
                    echo json_encode($responseNew);
}
}else{
$query= mysqli_query($con,"select Email,Password from driver Where Email='$email'");


$responseNew = array();

if (mysqli_num_rows($query)>0) {
    while($row=mysqli_fetch_assoc($query))
        { 
               $to = $row['email'];
               $subject = "Password Recovery";
               $message = "Your Password \n".$row['password'];
               $header = "From:NO-REPLY@abc.com \r\n";
               $retval = mail ($to,$subject,$message,$header);

               if ($retval) {
                    $responseNew["success"] = "yes";
                    // echoing JSON response
                    echo json_encode($responseNew);
               }else{
                    $responseNew["success"] = "no";
                    // echoing JSON response
                    echo json_encode($responseNew);
               }
        }
}else{
                        $responseNew["success"] = "no";
                    // echoing JSON response
                    echo json_encode($responseNew);
}
}

mysqli_close($con);

?>