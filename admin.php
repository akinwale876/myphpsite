<?php
session_start();

require 'connection.php';




if(isset($_POST['submit'])){
    
    
    
  $username = $_POST['username'];
    
   $password = $_POST['password'];
    
    $password = md5($password);

if($conn){
    

$sql = "SELECT * FROM author WHERE username='$username' AND password='$password' ";

$query = mysqli_query($conn,$sql);


if($query){
    
    
    $_SESSION['access'] = $password;
    
    
    header('location: welcome.php');


 
}else{
    
    
    echo 'error';
}


  
}
    
    
}




?>