<?php

session_start();

require 'connection.php';

$errors = array();


if(empty($errors)){

$date = date_create();


$date = date_timestamp_get($date);




echo  $ss = $_SESSION['access'];




$que = mysqli_query($conn, "SELECT * FROM `author` WHERE `password` = $ss");


echo $userEmail = mysqli_fetch_array($que)['email'];



$query = mysqli_query($conn,"INSERT INTO `activation_code` ( `email`, `code`, `date`) VALUES ( '$email', '$code', '$date')");

if($query){

    echo '<span style="color:green;">message sent</span>';

$to = "mayowashuaib5@gmail.com";
$subject = "User MESSAGE";

$message ='
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<link rel="stylesheet" href="http://smartgist.com.ng/style.css" />

<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto|Lato:400,900|Source+Sans+Pro:400,700|Montserrat:800" rel="stylesheet">


<link rel="stylesheet" href="http://smartgist.com.ng/stylemobile.css"/>



<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:locale" content="en_US" />

<title>MESSAGE FROM Smart Gist </title>



</head>
<body>


<div class="header-content" >


<a href="http://naijaramz.com"><img style="margin-left:30%;" src="http://naijaramz.com/14763d33-d8f5-4a53-b4f8-10263d9de8b3_200x200.jpg" height="150px"></a>

    </div>




<p>Welcome To NaijaRamz </p>
<table>
<tr>
<th>name</th>
<th>Email</th>
</tr>
<tr>
<td>'.$name.'</td>
<td>'.$email.'</td>
</tr>
</table>
</body>
</html>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


// More headers
$headers .= 'From: <naijaramz>' . "\r\n";
$headers .= 'Cc: NaijaRamz ' . "\r\n";

if(mail($to,$subject,$message,$headers)){

        echo '<p style="color:green;"><br>email sent</p>';

}



}

}else{


    print_r($errors);
}






?>